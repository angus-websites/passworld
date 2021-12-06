/**
 * Generate file
 * contains, functions and classes
 * for generating random passwords
 * @author Angus Goody
 * 09/10/21
 */


/**
 * The DataManager class
 * is a way of sharing data
 * between the JS files, this
 * is where the swear words
 * are stored when they are fetched
 * from the database
 */
class DataManager{
  constructor(swear_words, symbols){
    this.swear_words = swear_words
    this.symbols = symbols
  }

  get_symbols(){
    return this.symbols
  }

  get_swear_words(){
    return this.swear_words
  }
}

/**
 * The parameter class
 * is part of a password
 * i.e a number, letter or symbol
 */
class Parameter{

  constructor(content){
    this.content = content;
  }
  /**
   * Given the character string and a specified 
   * length, return a random segment
   * @param  {string} str    [string list]
   * @param  {int} length [length of random string]
   */
  static pickRandomChar(str,length){
    var string = ""
    for (var j = 0; j < length; j++) {
      string += str.charAt(Math.floor(Math.random() * str.length))
    }
    return string
  }

  /**
   * Get a random selection of
   * this parameter given a length
   */
  getRandom(length){
    return Parameter.pickRandomChar(this.content,length)
  }
}

class RudeParameter{

  constructor(wordList){
    this.wordList=wordList
  }

  /**
   * Fetch a random rude
   * word given the length of 
   * the master string
   */
  getWord(maxSize){

    //Shuffle list
    this.wordList.sort(() => Math.random() - 0.5);

    //Loop though words
    for (var i = 0; i < this.wordList.length; i++) {
      const current = this.wordList[i]
      if (current.length < maxSize){
        return current
      }
    }
    return "";
  }
}

/**
 * Complexity class is 
 * responsible for specifying
 * how complex a password
 * should be, should it contain
 * numbers, letters, symbols etc
 * @param length: The length of the password
 * @param letters: Boolean - contains letters
 * @param numbers: Boolean - contains numbers
 * @param uppercase: Boolean - contains uppercase
 * @param symbols: Boolean - contains symbols
 */
class Complexity{

  constructor(length,letters,numbers,uppercase,symbols,rude,dataManager){
    this.length = length
    this.hasLetters = letters
    this.hasNumbers = numbers
    this.hasUppercase = uppercase
    this.hasSymbols = symbols
    this.hasRude = rude
    this.dataManager = dataManager

    this.letters = new Parameter("abcdefghijklmnopqrstuvwxyz");
    this.uppercase = new Parameter("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    this.numbers = new Parameter("0123456789");
    this.symbols = new Parameter(this.dataManager.get_symbols());
    this.rude = new RudeParameter(this.dataManager.get_swear_words()) //TODO get from server

    //Get number of parameters for this complexity
    this.params = this.filterParamaters().sort(() => Math.random() - 0.5);
    this.numberOfParams=this.params.length

    //Store generated password
    this.password = ""

    //Generate on load
    this.generate()

  }

  /**
   * Return a list of only the required
   * parameters for this complexity
   */
  filterParamaters(){
    var includedArray = []
    const filterArray = [
        [this.letters, this.hasLetters],
        [this.numbers, this.hasNumbers],
        [this.uppercase, this.hasUppercase],
        [this.symbols, this.hasSymbols]
    ];
    for(var i = 0; i < filterArray.length; i++) {
        var par = filterArray[i];
        const param = par[0]
        const included = par[1]
        if(included){
          includedArray.push(param)
        }
    }
    return includedArray;

  }

  /**
   * Will generate a random
   * string of characters
   */
  generate(){
    var master = "";

    //Size of password to split
    var splitSize = this.length 
    var paramCount = this.numberOfParams

    //Check to see if we need a rude word and adjust split & param count
    if(this.hasRude){
      //Generate rude word
      var rudeWord = this.rude.getWord(this.length)
      splitSize = splitSize-rudeWord.length
    }

    //Calculate set size for each param
    let setSize = Math.floor(splitSize/paramCount);  
    let finalSetSize = splitSize-(setSize*(paramCount-1))

    //Loop through each set
    for (var i = 0; i < paramCount; i++) {
      var size = setSize
      if(i >= paramCount - 1){
        size = finalSetSize
      }
      var currentSet = this.params[i]
      switch(currentSet) {
        case this.uppercase:
          master+=this.getUppercase(size)
          break
        case this.numbers:
          master+=this.getNumbers(size)
          break
        case this.symbols:
          master+=this.getSymbols(size)
          break
        default:
          master+=this.getLetters(size)
          break
      }

    }

    //Shuffle string
    master=master.shuffle()

    //Slice string and insert rude word
    if (this.hasRude){
      master = master.slice(0, Math.floor(splitSize/2)) + rudeWord + master.slice(Math.floor(splitSize/2));
    }

    //Save password to class
    this.password = master
  }

  /**
   * Estimate the amount of time
   * it would take to crack the password
   * in minutes
   * @return: Time in 
   */
  estimate(){
    password = this.password
    //Regular expressions
    let numbersExpression = /\d/ ;
    let lowerExpression = /[a-z]/;
    let upperExpression = /[A-Z]/;
    let symbolsExpression = /[\!\"\#\$\%\&\'\(\)\*\+\,\-\.\/\:\;\<\>\=\?\@\[\]\{\}\\\\\^\_\`\~]/;
    //Create a dictionary
    var regexDict=[[numbersExpression,9],[lowerExpression,26],[upperExpression,26],[symbolsExpression,30]]

    //Calculate the set length
    var setLength = 0;
    for(var i=0; i < regexDict.length; i++) {
      var key=regexDict[i][0];
      var value=regexDict[i][1];
      //Get the value (current set length)
      if ((password.match(key))){
        setLength+=value;
      }
    }

    //Store constants
    let averagePC = 1.21e-7
    let superComputer = 1.21e-11;

    //Return
    return 0.5*Math.pow(setLength,password.length) * superComputer; 

  }

  /**
   * Get a random string
   * of letters
   * @param  {int} length [length of random string]
   */
  getLetters(length){
    return this.letters.getRandom(length)
  }

  /**
   * Get a random string
   * of uppercase letters
   * @param  {int} length [length of random string]
   */
  getUppercase(length){
    return this.uppercase.getRandom(length)
  }

  /**
   * Get a random string
   * of numbers
   * @param  {int} length [length of random string]
   */
  getNumbers(length){
    return this.numbers.getRandom(length)
  }

  /**
   * Get a random string
   * of symbols
   * @param  {int} length [length of random string]
   */
  getSymbols(length){
    return this.symbols.getRandom(length)
  }

}


/*
 * Will convert time in seconds to a more 
 * readable format
 */
function convertTime(time){
  //Array to convert time to a string value
  var data=[["Seconds",60],["Minutes",3600],["Hours",86400],["Days",3.154e7],["Years",3.154e8],["Decades",3.154e9],["Centurys",3.154e10],["Milleniums",3.154e11]];
  //Setup response
  var response="???"
  if (time < 1){
    response="Less than a second"
  }else{
    //Loop through time stamps
    for (var i =0; i < data.length;i++){
      item=data[i]
      //If the generated time is less than the current timestamp
      if (time < item[1]){
        var divisor = 1
        if (i > 0){
          divisor=data[i-1][1];
        }
        //Divide the generate time by the divisor and create a string
        response = Math.round(time/divisor)+" "+item[0];
        break;
      }
      response="Over 1 Million Years"
        
    }
  }
  return response;
}

/*
 * Function will rank a generated password
 * returns 1, 2 or 3 (3 being best)
 */
function rankPassword(timeToCrack){
  //If password can be cracked in less than an hour
  if (timeToCrack < 3600){
    return 1
  //If can be cracked in under a year
  }else if(timeToCrack < 3.154e7){
    return 2
  }
  //Takes over a year to crack
  return 3
}



/**
 * Custom shuffle method to 
 * scramble a string into a random
 * order
 */
String.prototype.shuffle = function () {
  var a = this.split(""),
    n = a.length;

  for(var i = n - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    var tmp = a[i];
    a[i] = a[j];
    a[j] = tmp;
  }
  return a.join("");
}



