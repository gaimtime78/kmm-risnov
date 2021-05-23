/** 
 * -----------README PLEASE-------------
 * 
 * - pemanggilan fungsi :
 * initMulDrop(Obj)
 * 
 * - properties :
 * Obj = {
 *  selector:String (Selector container dropdown),
 *  label:String (Keterangan dropdown)
 *  name:String (name untuk <select name="namanya nanti disini">, tidak perlu ditambahkan [])
 *  options:ArrayOf[Object:{value:String/Number, text:String/Number}] (opsi yang akan ditampilkan, berupa array yang isinya object {value, text})
 *  initialValue:ArrayOf[value:String/Number] (value yang sudah ada saat dropdown ditampilkan)
 * }
 * 
 * 
*/
function initMulDrop ({selector, label, options, name, initialValue, single=false}){
  let container = document.querySelector(selector)
  let optionDom = ''
  let optionForm = ''
  let containerOption = ''
  if(initialValue){
    initialValue.map(v => {
      let objOptions = options.find(o => o.value === v)
      let valText = objOptions?objOptions.text:'--tidak ketemu--'
      if(valText !== '--tidak ketemu--'){
        optionForm += `<input type="hidden" name="${name}[]" value="${v}" id="${name}-opt-${v}"></input>`
        containerOption += `<div onclick="removeValue('${v}', '${name}')" id="${name}-opt-btn-${v}" style="margin-right:1em; margin-top:1em;" class="waves-effect waves-light btn btn-sm cyan darken-1" value="${v}">${valText}</div>`
      }
    })
  }
  if(options){
    options.map(v => {
      optionDom += `<option value="${v.value}">${v.text}</option>`
    })
  }
  if(container){
    container.innerHTML = `
    <div style="margin-top:2em;"></div>
    <label>${label}</label>
    <div id="${name}-option-form">${optionForm}</div>
    <div id="${name}-container-option">
    ${containerOption}
    <div style="width:100%;"><label>(Pilih Opsi/ Klik Tombol Diatas untuk menghilangkan)</label></div>
    </div>
    <select name="${name}Select" id="category" onchange="addValue(this, '${name}', ${single})">
        <option id="${name}-select-zero" value="" disabled selected>Select this options</option>
        ${optionDom}
    </select>
    `
  }
}

function addValue (e, name, single) {
  const valVal = e.options[e.selectedIndex].value
  const valText = e.options[e.selectedIndex].text
  const listChild = document.querySelector(`#${name}-opt-${valVal}`)
  const listChildBtn = document.querySelector(`#${name}-opt-btn-${valVal}`)
  if(listChild){
      listChild.remove()
      listChildBtn.remove()
  }else{
    const catContainer = document.getElementById(`${name}-option-form`)
    const catForm = document.getElementById(`${name}-container-option`)
    
    if(single){
      catForm.innerHTML = `<input type="hidden" name="${name}[]" value="${valVal}" id="${name}-opt-${valVal}"></input>`
      catContainer.innerHTML = `<div onclick="removeValue('${valVal}', '${name}')" id="${name}-opt-btn-${valVal}" style="margin-right:1em; margin-top:1em;" class="waves-effect waves-light btn btn-sm cyan darken-1" value="${valVal}">${valText} </div>`
    }else{
      catForm.innerHTML += `<input type="hidden" name="${name}[]" value="${valVal}" id="${name}-opt-${valVal}"></input>`
      catContainer.innerHTML += `<div onclick="removeValue('${valVal}', '${name}')" id="${name}-opt-btn-${valVal}" style="margin-right:1em; margin-top:1em;" class="waves-effect waves-light btn btn-sm cyan darken-1" value="${valVal}">${valText} </div>`
    }
    
  }
}

function removeValue (e, name) {
  const listChild = document.querySelector(`#${name}-opt-${e}`)
  const listChildBtn = document.querySelector(`#${name}-opt-btn-${e}`)
  listChild.remove()
  listChildBtn.remove()
}

