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
    masterString = ""
    for (var j = 0; j < length; j++) {
      masterString += str.charAt(Math.floor(Math.random() * str.length))
    }
    return masterString
  }

  /**
   * Get a random selection of
   * this parameter given a length
   */
  getRandom(length){
    return this.pickRandomChar(this.content,length)
  }
}

/**
 * Used for storing and mixing
 * parameters together
 */
class ParameterHub{
  constructor(paramList){
    this.paramList = paramList
  }

  shuffle(){
    return this.paramList.sort(() => Math.random() - 0.5)
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

  static letters = Parameter("abcdefghijklmnopqrstuvwxyz");
  static uppercase = Parameter("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
  static numbers = Parameter("0123456789");
  static symbols = Parameter(",./@()[]&%£$");

  constructor(length,letters,numbers,uppercase,symbols){
    this.length = length
    this.hasLetters = letters
    this.hasNumbers = numbers
    this.hasUppercase = uppercase
    this.hasSymbols = symbols

    //Get number of parameters for this complexity
    this.params = [hasLetters,hasNumbers,hasUppercase,hasSymbols].filter(Boolean);
    this.numberOfParams=this.params.length;
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

    master = "";
    //Calculate set size for each param
    let setSize = Math.floor(this.length/this.numberOfParams);  
    let finalSetSize = this.length-(setSize*(this.numberOfParams-1))
    //Loop through each set
    for (var i = 0; i < this.numberOfParams; i++) {
      size = setSize
      if(i >= this.numberOfParams - 1){
        size = finalSetSize
      }
      currentSet = this.params[i]
      switch(currentSet) {
        case this.hasUppercase:
          master+=getUppercase(size)
          break
        case this.hasNumbers:
          master+=getNumbers(size)
          break
        case this.hasSymbols:
          master+=getSymbols(size)
          break
        default:
          master+=getLetters(size)
          break
      }

    }

    return master
  }

  /**
   * Given the character string and a specified 
   * length, return a random segment
   * @param  {string} str    [string list]
   * @param  {int} length [length of random string]
   */
  static pickRandomChar(str,length){
    masterString = ""
    for (var j = 0; j < length; j++) {
      masterString += str.charAt(Math.floor(Math.random() * str.length))
    }
    return masterString
  }

  /**
   * Get a random string
   * of letters
   * @param  {int} length [length of random string]
   */
  getLetters(length){
    return this.pickRandomChar(this.letters,length)
  }

  /**
   * Get a random string
   * of uppercase letters
   * @param  {int} length [length of random string]
   */
  getUppercase(length){
    return this.pickRandomChar(this.letters.toUpperCase(),length)
  }

  /**
   * Get a random string
   * of numbers
   * @param  {int} length [length of random string]
   */
  getNumbers(length){
    return this.pickRandomChar(this.numbers,length)
  }

  /**
   * Get a random string
   * of symbols
   * @param  {int} length [length of random string]
   */
  getSymbols(length){
    return this.pickRandomChar(this.symbols,length)
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