function showTab(tab){
    document.querySelectorAll('[id^="tab-content-"]').forEach(el =>el.classList.add('!hidden'))
    document.getElementById('tab-content-' + tab).classList.remove('!hidden')

    document.querySelectorAll('[id^="tab-button-"]').forEach(btn => {
        btn.classList.remove('tab-active')
        btn.classList.add('tab-inactive')
    })
    document.getElementById('tab-button-' + tab).classList.add('tab-active')
    document.getElementById('tab-button-' + tab).classList.remove('tab-inactive')
}
