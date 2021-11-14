/**
 * Generate file
 * contains, functions and classes
 * for generating random passwords
 * @author Angus Goody
 * 09/10/21
 */


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

  constructor(length,letters,numbers,uppercase,symbols,rude){
    this.length = length
    this.hasLetters = letters
    this.hasNumbers = numbers
    this.hasUppercase = uppercase
    this.hasSymbols = symbols
    this.hasRude = rude

    this.letters = new Parameter("abcdefghijklmnopqrstuvwxyz");
    this.uppercase = new Parameter("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    this.numbers = new Parameter("0123456789");
    this.symbols = new Parameter(",./@()[]&%£$");
    this.rude = new RudeParameter(["tree","mole","balls"]) //TODO get from server

    //Get number of parameters for this complexity
    this.params = this.filterParamaters().sort(() => Math.random() - 0.5);
    this.numberOfParams=this.params.length

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

    return master
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


c =  new Complexity(20,true,true,true,true,false)
console.log(c.generate())