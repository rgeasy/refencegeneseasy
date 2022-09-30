/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/Gene.js ***!
  \******************************/
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return generator._invoke = function (innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; }(innerFn, self, context), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; this._invoke = function (method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); }; } function maybeInvokeDelegate(delegate, context) { var method = delegate.iterator[context.method]; if (undefined === method) { if (context.delegate = null, "throw" === context.method) { if (delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method)) return ContinueSentinel; context.method = "throw", context.arg = new TypeError("The iterator does not provide a 'throw' method"); } return ContinueSentinel; } var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, define(Gp, "constructor", GeneratorFunctionPrototype), define(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (object) { var keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

window.Gene = /*#__PURE__*/function () {
  function Gene() {
    _classCallCheck(this, Gene);

    console.log("Classe Gene\n");
    this.species = [];
  }

  _createClass(Gene, [{
    key: "print_form_data",
    value: function print_form_data(form) {
      console.log("Form Data:");
      console.log(form);
    }
  }, {
    key: "execute",
    value: function execute() {
      window.species_type = "";
      var area = document.getElementById("area");
      area.innerHTML = "";
      var generateTable = document.getElementById("generateTable");
      var generateRefGenes = document.getElementById("generateRefGenes");
      var cq_table = document.getElementById("CT-table");
      var self = this;
      var genes_names = '';
      generateTable.addEventListener('click', function (e) {
        var species_input = document.getElementById("species-tag-input").value;
        window.species_array = species_input.split(",");

        if (window.species_array.length === 1) {
          _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
            var _yield$Swal$fire, type, cards, geneCards;

            return _regeneratorRuntime().wrap(function _callee$(_context) {
              while (1) {
                switch (_context.prev = _context.next) {
                  case 0:
                    _context.next = 2;
                    return Swal.fire({
                      title: window.words['choose_species'],
                      input: 'radio',
                      width: 600,
                      inputOptions: {
                        '1': window.words['animal'],
                        '2': window.words['vegetable'],
                        '3': window.words['microorganism']
                      },
                      inputValidator: function inputValidator(value) {
                        if (!value) {
                          return 'You need to choose something!';
                        }

                        window.species_type = value;
                      }
                    });

                  case 2:
                    _yield$Swal$fire = _context.sent;
                    type = _yield$Swal$fire.value;
                    genes_names = self.parseCTs(area.value);
                    cards = self.createCard(genes_names);
                    geneCards = document.getElementById("geneCards");
                    geneCards.innerHTML = cards;

                  case 8:
                  case "end":
                    return _context.stop();
                }
              }
            }, _callee);
          }))();
        } else {
          genes_names = self.parseCTs(area.value);
          var cards = self.createCard(genes_names);
          var geneCards = document.getElementById("geneCards");
          geneCards.innerHTML = cards;
        }
      });
      generateRefGenesold.addEventListener('click', function (e) {
        e.preventDefault();
        var genes = document.getElementsByName('genes[]');
        var cqs = document.getElementsByName('cqs[]');
        console.log("Form:");
        var form_new_species = document.getElementById("form-new-species");
        var novos_dados = "";
        var i = 0;

        for (i = 1; i < genes.length; i++) {
          if (i === genes.length - 1) novos_dados = novos_dados + genes[i].value + '\n';else novos_dados = novos_dados + genes[i].value + '\t';
        }

        var j = 0;
        var parced_cqs = "";

        for (j = 1; j < cqs.length; j++) {
          //console.log("Debugging CTs");
          //console.log(cqs);
          if (j % genes.length === 0) {
            parced_cqs = cqs[j].value.replace(/ /gi, '__');
            novos_dados = parced_cqs + '\n';
          } else {
            parced_cqs = cqs[j].value.replace(/,/gi, '.');
            novos_dados = novos_dados + cqs[j].value + '\t';
          }
        }

        var species_input = document.createElement('input');
        species_input.value = document.getElementById("species-tag-input").value;
        species_input.setAttribute('name', 'species');
        form_new_species.appendChild(species_input);
        cqs = document.getElementsByName('cqs[]');
        var lines = "";
        console.log("CQS");
        console.log(cqs);

        for (var i = 0; i < cqs.length; i++) {
          if (i == 0) {
            lines = cqs[i].value.replace(/ /gi, '__');
          } else if (i % genes.length != 0) {
            parced_cqs = cqs[i].value.replace(/,/gi, '.');
            lines = lines + "\t" + parced_cqs;
          } else {
            cqs[i].value = cqs[i].value.replace(/ /gi, '__'); //var resto = i%genes.length;
            //alert("i: " + i + "\nResto: " + resto+"\nValor: " + cqs[i].value);

            lines = lines + "\n" + cqs[i].value;
          }
        }

        area.value = lines; //console.log("Area CQ");
        //console.log(area);

        $('input[name="cqs[]"').remove(); //throw new Error("ERROR");

        var genes_data = document.getElementById('gene_area');
        form_new_species.appendChild(genes_data);
        form_new_species.submit();
      });
    }
  }, {
    key: "createCard",
    value: function createCard(genes) {
      var html = "";
      var htmlAux = "";
      var self = this;
      var speciesArray = document.getElementById("species-tag-input").value;
      speciesArray = speciesArray.split(',');
      var species = speciesArray.map(function (item, index) {
        return "<option value=" + index + ">" + item + "</option>";
      });
      genes = genes.filter(function (item) {
        return item != 'AMOSTRAS';
      });
      var selecq_species = "";

      if (window.species_type === "") {
        selecq_species = "<select name=\"tipo[]\" class='form-control' required  style='display: inline-block; width: initial; float: right;'>\t\t\t\t\t\t\t\t<option value=\"-1\">".concat(window.words['type'], "</option><option value='1'>").concat(window.words['animal'], "</value><option value='2'>").concat(window.words['vegetable'], "</value><option value='3'>").concat(window.words['microorganism'], "</value>\n\t\t\t\t\t\t\t</select>\t\t\t\t\t\t\t<select name=\"selected_species[]\" class='form-control' required style='display: inline-block; width: initial; float: right; margin-right: .3rem;'>\t\t\t\t\t\t\t\t<option value=\"-1\">").concat(window.words['species'], "</option>").concat(species, "\n\t\t\t\t\t\t\t</select>");
      } else {
        var species_type_name = "";

        switch (window.species_type) {
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

        selecq_species = "<select name=\"tipo[]\" class='form-control' required readonly=\"readonly\" style='display: inline-block; width: initial; float: right;'>\t\t\t\t\t\t\t\t<option value='".concat(window.species_type, "' selected>").concat(species_type_name, "</value>\n\t\t\t\t\t\t\t</select>\t\t\t\t\t\t\t<select name=\"selected_species[]\" class='form-control' required readonly=\"readonly\" style='display: inline-block; width: initial; float: right; margin-right: .3rem;'>\t\t\t\t\t\t\t\t").concat(species[0], "\t\t\t\t\t\t\t</select>\t\t\t\t\t\t\t");
      }

      for (var i = 0; i < genes.length; i++) {
        htmlAux = "<div class='form-group col-md-6 col-sm-6 col-lg-6'>\t\t\t<div class='col-sm-12 col-md-12 col-lg-12'>\t\t\t\t<div class='card border-secondary mb-3'>\t\t\t\t\t<div class='card-header'>\t\t\t\t\t  \t<div class='form-group col-lg-12 col-md-12 col-sm-12'>\t\t\t\t\t\t\t<label for='selecq_gene' style='padding-top: 8px;'>Gene: <b>".concat(genes[i], "</b></label>\t\t\t\t\t\t\t").concat(selecq_species, "\n\t\t\t\t\t\t</div><!-- end form-group --!>\n\t\t\t\t\t</div><!-- end card-header --!>\t\t\t\t\t<div class='card-body text-secondary'>\t\t\t\t\t\t<div class='row'>\t\t\t\t\t\t\t<div class='form-group col-lg-6 col-md-6 col-sm-6'>\t\t\t\t\t\t\t\t<label for='primer_forward'>").concat(window.words['primer_forward'], "</label>\t\t\t\t\t\t\t\t<input type='text' class='form-control' name='primer_forward[]' >\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<div class='form-group col-lg-6 col-md-6 col-sm-6'>\t\t\t\t\t\t\t\t<label for='primer_reverse'>").concat(window.words['primer_reverse'], "</label>\t\t\t\t\t\t\t\t<input type='text' class='form-control' name='primer_reverse[]'>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t</div><!-- end row --!>\t\t\t\t\t\t<div class='row'>\t\t\t\t\t\t\t<div class='form-group col-lg-3 col-md-3 col-sm-6'>\t\t\t\t\t\t\t\t<label>R2</label>\t\t\t\t\t\t\t\t<input type='text' class='form-control' name='r2[]'>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<div class='form-group col-lg-3 col-md-3 col-sm-6'>\t\t\t\t\t\t\t\t<label>\t\t\t\t\t\t\t\t\t<span data-tooltip='Overall Stability Value'>\t\t\t\t\t\t\t\t\t\te*\t\t\t\t\t\t\t\t\t</span>\t\t\t\t\t\t\t\t</label>\t\t\t\t\t\t\t\t<input type='text' class='form-control' name='e[]'>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<div class='form-group col-lg-3 col-md-3 col-sm-6'>\t\t\t\t\t\t\t\t<label>Accession n</label>\t\t\t\t\t\t\t\t<input type='text' class='form-control' name='accession[]'>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<div class='form-group col-lg-3 col-md-3 col-sm-6'>\t\t\t\t\t\t\t\t<label>").concat(window.words['bank'], "</label>\t\t\t\t\t\t\t\t<input type='text' class='form-control' name='bank[]'>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t</div><!-- end row --!>\t\t\t\t\t</div><!-- end card-body --!>\t\t\t\t</div><!-- end card --!>\t\t\t</div>\t \t </div>\t \t ");
        html = html.concat(htmlAux);
      }

      return html;
    }
    /*
    *	Create Form-Table with CQ Data
    *	returns genes names
    */

  }, {
    key: "parseCTs",
    value: function parseCTs(data) {
      console.log(data);
      var generateTable = document.getElementById("generateTable");
      var cq_table = document.getElementById("CT-table");
      generateTable.style.display = 'none';
      cq_table.style.display = 'block';
      var expression = Array();
      var array = data.split("\n");
      console.log(array); //throw new Error("Exit!!!");
      //exit();

      var i = 0;
      array.forEach(function (row) {
        //console.log(row);
        if (row !== "" && row !== null) {
          expression[i++] = row.split("\t");
        }
      });
      var ths = cq_table.querySelector("thead > tr");

      for (var i = 0; i < expression[0].length; i++) {
        var th = document.createElement('th');
        if (i === 0 && (expression[0][0] === '' || expression[0][0] === null)) th.innerHTML = "<th><input type='text' size='10' name=genes[] value='Samples'></th>";else th.innerHTML = "<th><input type='text' size='10' name=genes[] value='" + expression[0][i] + "'></th>";
        ths.appendChild(th);
      }

      var trs = cq_table.querySelector("tbody");

      for (var i = 1; i < expression.length; i++) {
        var tr = document.createElement('tr');
        var string = "";

        for (var j = 0; j < expression[0].length; j++) {
          string = string + "<td><input type='text' size='15' name=cqs[] value='" + expression[i][j] + "'</td>";
        }

        tr.innerHTML = string;
        trs.appendChild(tr);
      }

      var genes = expression[0].slice(0, 0).concat(expression[0].slice(1, expression[0].length));
      return genes;
    }
  }]);

  return Gene;
}();
/******/ })()
;