function optionSelected(option) {
    
    if(option.classList.contains('selected')) {

        option.classList.remove('selected');
        option.classList.add('unselected');

        // Turn the visibility of the error message off
        let error = document.querySelectorAll('.error-msg');
        for (let i = 0; i < error.length; i++) {
            error[i].classList.remove('visible');
            error[i].classList.add('hidden');

            console.log(error[i]);
        }

        // Remove the form
        let form = document.getElementById(option.id.replace("-option", "") + '-form');
        form.classList.remove('selected');
        form.classList.add('unselected');

        // Scroll to the top of the page smoothly
        window.scrollTo({top: 0, behavior: 'smooth'});

    } else {

        // Check that the other options are not selected
        let options = document.querySelectorAll('.option-container')
        
        for(let i = 0; i < options.length; i++) {
            if(options[i].classList.contains('selected')) {
                options[i].classList.remove('selected');
                options[i].classList.add('unselected');
            }
        }

        option.classList.remove('unselected');
        option.classList.add('selected');

        // Add the form to the editor
        addOptionForm(option.id);

        // Scroll to the form
        let form = document.getElementById(option.id.replace("-option", "") + '-form');
        form.scrollIntoView({behavior: "smooth"});
    }

}

function addOptionForm(optionID) {
    // Remove the current form
    let forms = document.querySelectorAll('.option-form');
    for (let i = 0; i < forms.length; i++) {
        forms[i].classList.remove('selected');
        forms[i].classList.add('unselected');
    }

    // Give the new form a class of 'selected'
    if (optionID === 'article-creator-option') {
        form = document.getElementById('article-creator-form');
        form.classList.remove('unselected');
        form.classList.add('selected');
    } else if (optionID === 'article-editor-option') {
        form = document.getElementById('article-editor-form');
        form.classList.remove('unselected');
        form.classList.add('selected');
    } else if (optionID === 'game-creator-option') {
        form = document.getElementById('game-creator-form');
        form.classList.remove('unselected');
        form.classList.add('selected');
    }
}