
    function setupRegistration()
    {
        console.log("Creating Species along with Genes and storing Samples.\n");

        var cq_area = document.getElementById('cq_area');
        cq_area.innerHTML = "";
        var gene_area = document.getElementById('gene_area');
        gene_area.innerText = "";

        var generateRefGenes = document.getElementById("generateRG");
    
        generateRefGenes.addEventListener('click', function(e) {
          e.preventDefault();
    
          console.log("Form:");
          var form_new_species = document.getElementById("form-new-species");
  
          var species_input = document.createElement('input');
          species_input.value = document.getElementById("species-tag-input").value;
          species_input.setAttribute('type','hidden');
          species_input.setAttribute('name','species');
          form_new_species.appendChild(species_input);

          //throw new Error("ERROR");
          //var genes_data= document.getElementById('gene_area');
          //form_new_species.appendChild(genes_data);
          form_new_species.submit();
  
        });


    }

    setupRegistration();
