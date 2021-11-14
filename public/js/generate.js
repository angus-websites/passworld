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

  constructor(length,letters,numbers,uppercase,symbols){
    this.length = length
    this.hasLetters = letters
    this.hasNumbers = numbers
    this.hasUppercase = uppercase
    this.hasSymbols = symbols

    this.letters = new Parameter("abcdefghijklmnopqrstuvwxyz");
    this.uppercase = new Parameter("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    this.numbers = new Parameter("0123456789");
    this.symbols = new Parameter(",./@()[]&%£$");

    //Get number of parameters for this complexity
    this.params = this.filterParamaters();
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

  shuffle(){
    return this.params.sort(() => Math.random() - 0.5)
  }

  /**
   * Will generate a long list
   * of characters, symbols, numbers
   * that will go into the password, just
   * not mixed yet
   */
  getMasterString(){

    var master = "";
    //Calculate set size for each param
    let setSize = Math.floor(this.length/this.numberOfParams);  
    let finalSetSize = this.length-(setSize*(this.numberOfParams-1))
    console.log("Set size is: "+setSize)
    //Loop through each set
    for (var i = 0; i < this.numberOfParams; i++) {
      var size = setSize
      if(i >= this.numberOfParams - 1){
        size = finalSetSize
      }
      var currentSet = this.params[i]
      console.log("CURRENT SET "+currentSet)
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
 * The password class is 
 * where the passwords are 
 * created given their complexity
 */
class Password{
  constructor(complexity){

  }
}

c =  new Complexity(20,true,true,true,true)
console.log(c.getMasterString())