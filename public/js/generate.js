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
   * Will rank the password on a scale
   * of 1-3 1 being weak and 3 being strong
   */
  rank(){
    if(this.password.length < 5){
      return 1
    }else if(this.password.length > 10){
      return 3
    }else{
      return 2
    }
  }

  /**
   * Estimate the amount of time
   * it would take to crack the password
   * in minutes
   */
  estimate(){
    return 1;
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


//Wait for DOM to load
document.addEventListener('DOMContentLoaded', (event) => {

  //Slider
  const $slider = $("#lengthSlider");
  const $sliderLabel = $("#lengthLabel")

  //Label
  const $passwordLabel=$("#passwordLabel");
  const $lengthLabel = $("#lengthLabel")

  //Checkboxes
  const $numCheck = $("#numCheck");
  const $lettCheck = $("#lettCheck");
  const $symCheck = $("#symCheck");
  const $rudeCheck = $("#rudeCheck");

  const $checkParent ="#checkParent input[type='checkbox']";

  const $strengthSVG = "#strengthSVG";

  //When the slider is moved
  $slider.on("input change", function() {
    getSliderAndUpdate(this.value)
  });

  //When a checkbox is selected
  $($checkParent).change(function() {

    console.log("Checkbox clicked state is: "+this.checked)
    //If it's currently disabled then simply enable it
    if (this.checked){
      $(this).prop("checked", true);
      //Regenerate when enabled again
      getSliderAndUpdate();
    }
    //Check at least 2 checkboxes are selected
    else if ($($checkParent+":checked").length >= 1){
      //Disable the checkbox
      $(this).prop("checked", false);
      //Regenerate when disabled
      getSliderAndUpdate();

    }
    else{
      //Force this checkbox to be enabled
      $(this).prop("checked", true);
    }  

  });



  function getSliderAndUpdate(val=document.getElementById("lengthSlider").value){
    //Update label
    $lengthLabel.text(val)
    update(val);
  }

  /**
   * Will generate a new password and display
   */
  function update(length){
    c = new Complexity(length,isChecked($lettCheck),isChecked($numCheck),isChecked($lettCheck),isChecked($symCheck),isChecked($rudeCheck))
    c.generate()
    password = c.password
    //Show strength etc
    showPasswordResults(c)
    $passwordLabel.text(password)
  }

  /**
   * Check if the given checkbox
   * has been selected
   */
  function isChecked(checkbox){
    return checkbox.is(':checked')
  }

  /**
   * Will remove all classes from an element
   * in the classList and replace with the variable
   * replaceWith
   */
  function replaceClass(element,classList,replaceWith){
    for (var i = 0; i < classList.length; i++) {
       element.removeClass(classList[i])
     } 
     element.addClass(replaceWith)
  }

  /**
   * Will rank the given password and 
   * display results and time estimates etc
   */
  function showPasswordResults(complexity){

    //Update the strength strip colour
    var classList = ["border-weak","border-medium","border-strong"]
    var strength = complexity.rank()
    replaceClass($("#strengthStrip"),classList,classList[strength-1])

    //Update the colour of the svg
    classList = ["text-weak","text-medium","text-strong"]
    replaceClass($($strengthSVG),classList,classList[strength-1])
  }

});
