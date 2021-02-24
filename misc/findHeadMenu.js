const arrMenu = [
  {
    id:'id1',
    nama:'nama1',
    subMenu:['id2', 'id3']
  },
  {
    id:'id2',
    nama:'nama2',
    subMenu:[]
  },
  {
    id:'id3',
    nama:'nama3',
    subMenu:['id4']
  },{
    id:'id4',
    nama:'nama4',
    subMenu:[]
  }
]

const findHead = (arrMenu) =>{
  let listHead = JSON.parse(JSON.stringify(arrMenu))
  arrMenu.map(v => {
    listHead = listHead.filter(o => {
      return !v.subMenu.includes(o.id)
    })
  })
  return listHead
}



console.log(findHead(arrMenu))