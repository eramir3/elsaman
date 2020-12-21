function changeLangDropdownPosition(screenWidth) {
    
    let dropdownMenu = document.getElementById('lang-dropdown-web');
    
    if (screenWidth.matches) { 
        let mobileDropdown = document.getElementById('mobile-dropdown');
        mobileDropdown.appendChild(dropdownMenu);
    } 
    else {
        let webDropdown = document.getElementById('web-dropdown');
        webDropdown.appendChild(dropdownMenu);
    }
}

let screenWidth = window.matchMedia("(max-width: 750px)")
changeLangDropdownPosition(screenWidth) // Call listener function at run time
screenWidth.addListener(changeLangDropdownPosition) // Attach listener function on state