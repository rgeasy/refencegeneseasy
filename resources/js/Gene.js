window.Gene =

class Gene
{
	constructor()
	{
		console.log("Classe Gene\n");
		this.species = [];
	}


	print_form_data(form)
	{
		console.log("Form Data:");
		console.log(form);
	}

	execute()
	{
	  window.species_type = "";
	  var area = document.getElementById("area");
	  area.innerHTML = "";

	  var generateTable = document.getElementById("generateTable");
	  var generateRefGenes = document.getElementById("generateRefGenes");
	  var cq_table = document.getElementById("CT-table");
	  var self = this;
	  var genes_names = '';

	  generateTable.addEventListener('click', function(e){
	  	var species_input = document.getElementById("species-tag-input").value;
	  	window.species_array = species_input.split(",");

	  	if (window.species_array.length === 1)
	  	{
		  (async function(){

		    const { value: type } = await Swal.fire({
		      title: window.words['choose_species'],
		      input: 'radio',
		      width: 600,
		      inputOptions: {
		        '1': window.words['animal'],
		        '2': window.words['vegetable'],
		        '3': window.words['microorganism']
		      },
		      inputValidator: (value) => {
		        if (!value) {
		          return 'You need to choose something!'
		        }
		        window.species_type = value;
		      }
		    });
		  	genes_names = self.parseCTs(area.value);
		  	var cards = self.createCard(genes_names);
		  	var geneCards = document.getElementById("geneCards");
		  	geneCards.innerHTML = cards;

		  })()
	  	}else
	  	{
		  	genes_names = self.parseCTs(area.value);
		  	var cards = self.createCard(genes_names);
		  	var geneCards = document.getElementById("geneCards");
		  	geneCards.innerHTML = cards;
	  	}
	  });

	  generateRefGenesold.addEventListener('click', function(e){
	    e.preventDefault();

	    var genes = document.getElementsByName('genes[]');
	    var cqs = document.getElementsByName('cqs[]');
	    console.log("Form:");
	    var form_new_species = document.getElementById("form-new-species");
		
	    var novos_dados = "";
	    var i = 0;
	    for(i = 1; i < genes.length; i++)
	    {
	      if(i === genes.length-1)
	        novos_dados = novos_dados + genes[i].value + '\n';
	      else
	        novos_dados = novos_dados + genes[i].value +  '\t';
	    }


	    var j = 0;
	    var parced_cqs = "";

	    for(j = 1; j < cqs.length; j++)
	    {
	      //console.log("Debugging CTs");
	      //console.log(cqs);
	      if(j%genes.length === 0)
	      {
			parced_cqs = cqs[j].value.replace(/ /gi, '__');

	      	novos_dados = parced_cqs + '\n';
	      }
	      else
	      {
	      	parced_cqs = cqs[j].value.replace(/,/gi, '.');
	      	novos_dados = novos_dados + cqs[j].value + '\t';
	      }
	    }


	    var species_input = document.createElement('input');
	    species_input.value = document.getElementById("species-tag-input").value;
	    species_input.setAttribute('name','species');
	    form_new_species.appendChild(species_input);

	    cqs = document.getElementsByName('cqs[]');
	    var lines = "";
	    console.log("CQS");
	    console.log(cqs);

	    for (var i = 0; i < cqs.length; i++)
	    {

			if (i == 0)
			{
				lines = cqs[i].value.replace(/ /gi, '__');
			}
			else if (i%genes.length != 0)
	      	{
	      		parced_cqs = cqs[i].value.replace(/,/gi, '.');
	      		lines = lines  + "\t" + parced_cqs;
	      	}else
	      	{
	      		cqs[i].value = cqs[i].value.replace(/ /gi, '__');
	      		//var resto = i%genes.length;
	      		//alert("i: " + i + "\nResto: " + resto+"\nValor: " + cqs[i].value);
	      		lines = lines + "\n" + cqs[i].value;
	      	}

	    }

	    area.value = lines;
	    //console.log("Area CQ");
	    //console.log(area);
	    $('input[name="cqs[]"').remove();
	    //throw new Error("ERROR");
		var genes_data= document.getElementById('gene_area');
		form_new_species.appendChild(genes_data);

		form_new_species.submit();

	  });


	}


	createCard(genes)
	{

		var html = "";
		var htmlAux = "";

		var self = this;

		var speciesArray = document.getElementById("species-tag-input").value;
		speciesArray = speciesArray.split(',');

		var species = speciesArray.map((item, index) => "<option value="+index+">"+item+"</option>");
		genes = genes.filter(item => item != 'AMOSTRAS');

		var selecq_species = "";

		if (window.species_type === "")
		{
			selecq_species = `<select name="tipo[]" class='form-control' required  style='display: inline-block; width: initial; float: right;'>\
								<option value="-1">${window.words['type']}</option><option value='1'>${window.words['animal']}</value><option value='2'>${window.words['vegetable']}</value><option value='3'>${window.words['microorganism']}</value>
							</select>\
							<select name="selected_species[]" class='form-control' required style='display: inline-block; width: initial; float: right; margin-right: .3rem;'>\
								<option value="-1">${window.words['species']}</option>${species}
							</select>`;
		}else
		{
			var species_type_name = "";

			switch (window.species_type)
			{
			  case '1':
			    species_type_name = window.words['animal'];
			    break;
			  case '2':
			  	species_type_name = window.words['vegetable'];
			    break;
			  case '3':
			    species_type_name = window.words['microorganism'];
			    break;
			}


			selecq_species = `<select name="tipo[]" class='form-control' required readonly="readonly" style='display: inline-block; width: initial; float: right;'>\
								<option value='${window.species_type}' selected>${species_type_name}</value>
							</select>\
							<select name="selected_species[]" class='form-control' required readonly="readonly" style='display: inline-block; width: initial; float: right; margin-right: .3rem;'>\
								${species[0]}\
							</select>\
							`;
		}

		for (var i = 0; i < genes.length; i++)
		{
			htmlAux =
		   `<div class='form-group col-md-6 col-sm-6 col-lg-6'>\
			<div class='col-sm-12 col-md-12 col-lg-12'>\
				<div class='card border-secondary mb-3'>\
					<div class='card-header'>\
					  	<div class='form-group col-lg-12 col-md-12 col-sm-12'>\
							<label for='selecq_gene' style='padding-top: 8px;'>Gene: <b>${genes[i]}</b></label>\
							${selecq_species}
						</div><!-- end form-group --!>\

					</div><!-- end card-header --!>\
					<div class='card-body text-secondary'>\
						<div class='row'>\
							<div class='form-group col-lg-6 col-md-6 col-sm-6'>\
								<label for='primer_forward'>${window.words['primer_forward']}</label>\
								<input type='text' class='form-control' name='primer_forward[]' >\
							</div>\
							<div class='form-group col-lg-6 col-md-6 col-sm-6'>\
								<label for='primer_reverse'>${window.words['primer_reverse']}</label>\
								<input type='text' class='form-control' name='primer_reverse[]'>\
							</div>\
						</div>\<!-- end row --!>\
						<div class='row'>\
							<div class='form-group col-lg-3 col-md-3 col-sm-6'>\
								<label>R2</label>\
								<input type='text' class='form-control' name='r2[]'>\
							</div>\
							<div class='form-group col-lg-3 col-md-3 col-sm-6'>\
								<label>\
									<span data-tooltip='Overall Stability Value'>\
										e*\
									</span>\
								</label>\
								<input type='text' class='form-control' name='e[]'>\
							</div>\
							<div class='form-group col-lg-3 col-md-3 col-sm-6'>\
								<label>Accession n</label>\
								<input type='text' class='form-control' name='accession[]'>\
							</div>\
							<div class='form-group col-lg-3 col-md-3 col-sm-6'>\
								<label>${window.words['bank']}</label>\
								<input type='text' class='form-control' name='bank[]'>\
							</div>\
						</div>\<!-- end row --!>\
					</div>\<!-- end card-body --!>\
				</div>\<!-- end card --!>\
			</div>\
	 	 </div>\
	 	 `;
	 	 html = html.concat(htmlAux);
		}


		return html;
	}

	/*
	*	Create Form-Table with CQ Data
	*	returns genes names
	*/
	parseCTs(data)
	{
		console.log(data);
	  	var generateTable = document.getElementById("generateTable");
	  	var cq_table = document.getElementById("CT-table");
		generateTable.style.display = 'none';
	    cq_table.style.display = 'block';
	    var expression = Array();
	    var array = data.split("\n");
	    console.log(array);
	    //throw new Error("Exit!!!");
	    //exit();
	    var i = 0;

	    array.forEach(function(row){
	      //console.log(row);
	      if(row !== "" && row !== null)
	      {
	        expression[i++] = row.split("\t");
	      }
	    });

	    var ths = cq_table.querySelector("thead > tr");

	    for (var i = 0; i < expression[0].length; i++)
	    {
	      var th = document.createElement('th');
	      if(i === 0 && (expression[0][0] === '' || expression[0][0] === null))
	        th.innerHTML = "<th><input type='text' size='10' name=genes[] value='Samples'></th>";
	      else
	        th.innerHTML = "<th><input type='text' size='10' name=genes[] value='"+expression[0][i]+"'></th>";

	      ths.appendChild(th);
	    }

	    var trs = cq_table.querySelector("tbody");

	    for (var i=1; i < expression.length ; i++)
	    {
	      var tr = document.createElement('tr');
	      var string = "";
	      for (var j=0; j < expression[0].length; j++)
	      {
	        string = string + "<td><input type='text' size='15' name=cqs[] value='"+expression[i][j]+"'</td>";
	      }

	      tr.innerHTML = string;
	      trs.appendChild(tr);
	    }

	    var genes = expression[0].slice(0,0).concat(expression[0].slice(1, expression[0].length));
	    return genes;
	}

};
