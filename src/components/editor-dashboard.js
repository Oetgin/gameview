function optionSelected(option) {
    
    if(option.classList.contains('selected')) {

        option.classList.remove('selected')
        option.classList.add('unselected')

    } else {

        // Check that the other options are not selected
        let options = document.querySelectorAll('.option-container')
        
        for(let i = 0; i < options.length; i++) {
            if(options[i].classList.contains('selected')) {
                options[i].classList.remove('selected')
                options[i].classList.add('unselected')
            }
        }

        option.classList.remove('unselected')
        option.classList.add('selected')

        // Add the form to the editor
        addOptionForm(option);

        // Scroll to the form
        let form = document.querySelector('.option-form')
        form.scrollIntoView({behavior: "smooth"})
    }

}

function addOptionForm(option) {
    
}