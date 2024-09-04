@extends('layouts/master')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-select.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-tagsinput.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('/css/genes.create.css') }}">

  <style>

* { box-sizing: border-box; }
body {
  font: 16px Arial;
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}



@media screen and (min-width: 768px) {
  label[for=img], label[for=file]{
    margin-left: .5rem;
  }
}

  </style>
@endsection

@section('content')
<br>

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
      <div style="padding-left: .3rem; padding-right: .3rem;">
        <form id="form-new-study" autocomplete="off" action="{{ url('/articles') }}" method="POST"  enctype="multipart/form-data"> <!-- Tem que ser aqui para centralizar corretamente. -->
          @csrf
          
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="image_citation">{{ __('genes.Find a Species') }}</label><br>
              <input id="speciesInput" class="form-control autocomplete" type="text" name="species" >
              @error('species')
                  <div class="alert alert-danger">{{ old('species') }} Ainda não existe! Favor Registre Nova Espécie.</div>
              @enderror            
            </div>
          </div>  
          <br>
          <div class="form-row" >
            <div class="form-group col-lg-7 col-md-12 col-sm-12">
              <label for="article">{{ __('commons.Article') }}</label>
              <input type="text" class="form-control" name="article">
            </div>
            <div class="form-group col-lg-3 col-md-12 col-sm-12">
              <label for="doi">{{ __('genes.DOI') }}</label>
              <input type="text" class="form-control" name="doi" placeholder="10.1007/s11240-016-1147-6">
            </div>
            <div class="form-group col-lg-2 col-md-12 col-sm-12">
              <label for="year">{{ __('genes.Year') }}</label>
              <input type="text" class="form-control" name="year" placeholder="2015">
            </div>
          </div>
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="authors">{{ __('commons.Authors') }}</label>
              <input type="text" class="form-control" name="authors">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12">
                <label for="area">{{ __('genes.Cq Values') }}</label>
                <textarea id="cq_area" name="cq_area" rows="4" cols="50" class="form-control">
                </textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12">
                <label for="gene_area">{{ __('genes.Reference Genes Information') }}</label>
                <textarea id="gene_area" name="gene_area" rows="4" cols="50" class="form-control">
                </textarea>
            </div>
          </div>

          <button type="button" class="btn btn-success btn-lg btn-block" id="generateRG">{{ __('genes.Generate Table') }}</button>
          <br>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
  </div>

</div>

@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="{{ asset('/js/genes/Gene.js') }}"></script>

<script type="text/javascript">
    var locale = '{{ config('app.locale') }}';
   /**
   * Main application element, simply registers the web components
   */
    var species = {!! json_encode($species) !!};
    species = species.map(spec => spec.charAt(0).toUpperCase() + spec.slice(1))

    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
            }
        }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
        } 
    
        autocomplete(document.getElementById("speciesInput"), species);



    

    /* Set up Registratin */
    function setupRegistration() {
        console.log("Creating Species along with Genes and storing Samples.\n");
        var cq_area = document.getElementById('cq_area');
        cq_area.innerHTML = "";
        var gene_area = document.getElementById('gene_area');
        gene_area.innerText = "";
        var generateRefGenes = document.getElementById("generateRG");
        generateRefGenes.addEventListener('click', function (e) {
            e.preventDefault();
            console.log("Form:");
            var form_new_species = document.getElementById("form-new-study");
            var species_input = document.createElement('input');
            species_input.value = document.getElementById("speciesInput").value;
            species_input.setAttribute('type', 'hidden');
            species_input.setAttribute('name', 'species');
            form_new_species.appendChild(species_input); //throw new Error("ERROR");
            //var genes_data= document.getElementById('gene_area');
            //form_new_species.appendChild(genes_data);

            form_new_species.submit();
        });
    }

    setupRegistration();

setupRegistration();

</script>
@endsection
