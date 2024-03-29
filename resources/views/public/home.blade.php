@section('title', 'Generate')
@section('description', "Generate a strong password using our advanced, rude algorithm")
<x-app-layout>
  <x-page-container>
    <div class="text-left">
 
       <x-text.page-title title="Generate a password" subtitle="Use one of our randomly generated passwords to keep your accounts safe and secure."/>


      <!--Password view-->
      <div x-data="{text_to_copy: 'helloWorld', text_copied: false}">
        <!-- Copied -->
        <div :class="text_copied ? '' : 'invisible'" class="p-2 text-center mt-10 text-sm text-info"> 
            Copied to clipboard!
        </div>
        <div id="passwordContainer" class="flex flex-row items-center mt-2 space-x-4 overflow-hidden rounded-t-lg shadow-md px-4 py-5 sm:px-6 flex-col sm:flex-row space-y-5 md:space-y-0 bg-strong-light">
          <!--Strength indicator-->
          <div class="flex-initial flex-1">
            <svg id="strengthSVG" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-strong" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
          </div>
          <!--Password view-->
          <div class="flex-1">
            <div class="">
              <p x-ref="password" id="passwordLabel" class="md:text-3xl text-xl sm:text-2xl monoFont"></p>
            </div>
          </div>
          <!--Copy and Refresh buttons (desktop)-->
          <div class="inline-flex flex-initial gap-x-2 flex-1">
            <x-button @click.prevent="window.navigator.clipboard.writeText($refs.password.textContent);text_copied=true;setTimeout(() => text_copied = false, 2000)" class="btn-ghost btn-square" aria-label="Copy to clipboard">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
              </svg>
            </x-button>
            <x-button class="btn-ghost btn-square" id="refreshButton" aria-label="Regenerate">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
              </svg>
            </x-button>
          </div>
        </div>
        <!--Strength & Time section-->
        <div id="strengthStrip" class="bg-white px-4 py-1 sm:px-6 rounded-b-lg shadow-md border-t-4 border-medium">
          <p class="md:text-base text-center text-sm">Time to crack: <b id="timeEstimate">15 years</b></p>
        </div>
      </div>

      <div class="shadow-ps bg-white overflow-hidden rounded-lg mt-8 px-4 py-5 sm:px-6">
        <!--Length Slider-->
        <div class="">
          <!--Length label-->
          <label for="lengthSlider" class="text-lg">Length: <span id="lengthLabel"></span></label>
          <input id="lengthSlider" type="range" min="3" aria-valuemin="3" max="35" aria-valuemax="35" value="10" aria-valuenow="10" class="range range-lg range-primary w-100 mt-3">
        </div>
        <!--Checkboxes-->
        <div id="checkParent" class="mt-10 flex flex-col sm:flex-row flex-wrap justify-center sm:space-x-5 md:space-x-10 lg:space-x-16 xl:space-x-20 mx-auto text-left space-y-2 sm:space-y-0">
          <!--Numbers-->
          <div class="flex-initial">
            <label class="cursor-pointer label" aria-label="Include Numbers in password">
              <input id="numCheck" type="checkbox" checked="checked" class="checkbox checkbox-lg core">
              <span class="mx-4 label-text">Numbers</span>
            </label>
          </div>
          <!--Letters-->
          <div class="flex-initial">
            <label class="cursor-pointer label" aria-label="Include Letters in password">
              <input id="lettCheck" type="checkbox" checked="checked" class="checkbox checkbox-lg core">
              <span class="mx-4 label-text">Letters</span>
            </label>
          </div>
          <!--Symbols-->
          <div class="flex-initial">
            <label class="cursor-pointer label" aria-label="Include Symbols in password">
              <input id="symCheck" type="checkbox" checked="checked" class="checkbox checkbox-lg core">
              <span class="mx-4 label-text">Symbols</span>
            </label>
          </div>
          <!--Rude-->
          <div class="flex-initial">
            <label class="cursor-pointer label" aria-label="Include rude words in password">
              <input id="rudeCheck" type="checkbox" class="checkbox checkbox-lg">
              <div data-tip="Insert a rude word into the middle of your password" class="tooltip">
                <span class="mx-4 label-text">Rude</span>
              </div>
            </label>
          </div>

        </div>
      </div>  
    </div>
  </x-page-container>
</x-app-layout>
<script src="{{ asset('js/generate.js') }}" defer></script>
<script type="text/javascript">

  //Wait for DOM to load
  document.addEventListener('DOMContentLoaded', (event) => {

    //Slider
    const $slider = $("#lengthSlider");
    const $sliderLabel = $("#lengthLabel")

    //Refresh button
    const $refreshButton = $("#refreshButton");

    //Label
    const $passwordLabel=$("#passwordLabel");
    const $lengthLabel = $("#lengthLabel")

    //Checkboxes
    const $numCheck = $("#numCheck");
    const $lettCheck = $("#lettCheck");
    const $symCheck = $("#symCheck");
    const $rudeCheck = $("#rudeCheck");

    const $checkParent ="#checkParent input[type='checkbox']";
    const $checkParentActive = "#checkParent input[type='checkbox']:checked.core"
    const $strengthSVG = "#strengthSVG";

    var swear_words= @json($swear_words->pluck('content')->toArray());
    var symbols = ",./@()[]&%£$"
    var dataManager = new DataManager(swear_words, symbols);


    //When the slider is moved
    $slider.on("input change", function() {
      getSliderAndUpdate(this.value)
    });

    //When a checkbox is selected
    $($checkParent).change(function() {
      //If it's currently disabled then simply enable it
      if (this.checked){
        $(this).prop("checked", true);
        //Regenerate when enabled again
        getSliderAndUpdate();
      }
      //Check at least 2 checkboxes are selected
      else if ($($checkParentActive).length >= 1){
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

    //When refresh is clicked
    $($refreshButton).click(function(){
      getSliderAndUpdate();
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
      c = new Complexity(length,isChecked($lettCheck),isChecked($numCheck),isChecked($lettCheck),isChecked($symCheck),isChecked($rudeCheck), dataManager)
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

      //Update the time estimate
      estimate = complexity.estimate()
      $("#timeEstimate").text(convertTime(estimate))

      //Update the strength strip colour
      var classList = ["border-weak","border-medium","border-strong"]
      var classListLight = ["bg-weak-light", "bg-medium-light", "bg-strong-light"]
      var strength = rankPassword(estimate)
      replaceClass($("#strengthStrip"),classList,classList[strength-1])
      replaceClass($("#passwordContainer"),classListLight,classListLight[strength-1])

      //Update the colour of the svg
      classList = ["text-weak","text-medium","text-strong"]
      replaceClass($($strengthSVG),classList,classList[strength-1])

      

    }

    getSliderAndUpdate();

  });
</script>