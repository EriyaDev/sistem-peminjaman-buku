const dropdownParent1 = document.getElementById('dropdown-parent-1')
const dropdownChild1 = document.getElementById('dropdown-child-1')
const dropdownChild2 = document.getElementById('dropdown-child-2')

function openDropdown1(){
    dropdownChild1.classList.toggle('dd-closed')
}

function openDropdown2(){
    dropdownChild2.classList.toggle('dd-closed')
}
