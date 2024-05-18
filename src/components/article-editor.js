// This JS part is useful to create a dynamic and pleasant article editor


// To set the number of each component
var partTitleNumber = 0;
var corpusNumber = 0;
var imageNumber = 0;


function addPartTitleInput() {
    let allInputsContainer = document.getElementById("all-inputs-container");

    // We wanna recreate this structure :
    // <div class="input-container">
    //     <label for="corpus">
            //     Contenu texte
                    // <a class="btn delete-btn" onclick="deleteSection(this)">
                    //     <img src="/assets/icons/minus.svg" alt="Supprimer">
                    //     <div class="hover-msg">Supprimer cette section</div>
                    // </a>
            // </label>
    //     <textarea class="input" id="part-title" name="part-title" rows="1" maxlength="199" required></textarea>
    // </div>


    // <div class="input-container">
    let inputContainer = document.createElement("div");
    inputContainer.classList.add("input-container");


    //     <label for="part-title-i">Titre de partie</label>
    let label = document.createElement("label");
    label.textContent = "Titre de partie";
    label.setAttribute("for", "part-title-"+partTitleNumber);
    inputContainer.appendChild(label);

    //     <div class="btn delete-btn" onclick="deleteSection(this)">
    let deleteBtn = document.createElement("a");
    deleteBtn.classList.add("btn");
    deleteBtn.classList.add("delete-btn");
    deleteBtn.setAttribute("onclick", "deleteSection(this)");

    //         <img src="/assets/icons/minus.svg" alt="Supprimer">
    let img = document.createElement("img");
    img.setAttribute("src", "/assets/icons/minus.svg");
    img.setAttribute("alt", "Supprimer");
    deleteBtn.appendChild(img);

    //         <div class="hover-msg">Supprimer cette section</div>
    let hoverMsg = document.createElement("div");
    hoverMsg.classList.add("hover-msg");
    hoverMsg.textContent = "Supprimer cette section";
    deleteBtn.appendChild(hoverMsg);

    label.appendChild(deleteBtn);

    //     <textarea class="input" id="part-title-i" name="part-title" rows="1" maxlength="199" required></textarea>
    let textarea = document.createElement("textarea");
    textarea.classList.add("input");
    textarea.setAttribute("id", "part-title-"+partTitleNumber);
    textarea.setAttribute("name", "part-title-"+partTitleNumber);
    textarea.setAttribute("rows", "1");
    textarea.setAttribute("maxlength", "199");
    textarea.setAttribute("required", "");
    inputContainer.appendChild(textarea);

    // </div>
    allInputsContainer.appendChild(inputContainer);

    partTitleNumber++;
}


function addCorpusInput() {
    let allInputsContainer = document.getElementById("all-inputs-container");

    // We wanna recreate this structure :
    // <div class="input-container">
    //     <label for="corpus">
            //     Contenu texte
                    // <a class="btn delete-btn" onclick="deleteSection(this)">
                    //     <img src="/assets/icons/minus.svg" alt="Supprimer">
                    //     <div class="hover-msg">Supprimer cette section</div>
                    // </a>
            // </label>
    //     <textarea class="input" name="corpus" id="corpus-i" rows="10" required></textarea>
    // </div>

    // <div class="input-container">
    let inputContainer = document.createElement("div");
    inputContainer.classList.add("input-container");

    //     <label for="corpus">Contenu texte</label>
    let label = document.createElement("label");
    label.textContent = "Contenu texte";
    label.setAttribute("for", "corpus-"+corpusNumber);
    inputContainer.appendChild(label);

    //     <div class="btn delete-btn" onclick="deleteSection(this)">
    let deleteBtn = document.createElement("a");
    deleteBtn.classList.add("btn");
    deleteBtn.classList.add("delete-btn");
    deleteBtn.setAttribute("onclick", "deleteSection(this)");

    //         <img src="/assets/icons/minus.svg" alt="Supprimer">
    let img = document.createElement("img");
    img.setAttribute("src", "/assets/icons/minus.svg");
    img.setAttribute("alt", "Supprimer");
    deleteBtn.appendChild(img);

    //         <div class="hover-msg">Supprimer cette section</div>
    let hoverMsg = document.createElement("div");
    hoverMsg.classList.add("hover-msg");
    hoverMsg.textContent = "Supprimer cette section";
    deleteBtn.appendChild(hoverMsg);

    label.appendChild(deleteBtn);

    //     <textarea class="input" name="corpus-i" id="corpus-i" rows="10" required></textarea>
    let textarea = document.createElement("textarea");
    textarea.classList.add("input");
    textarea.setAttribute("id", "corpus-"+corpusNumber);
    textarea.setAttribute("name", "corpus-"+corpusNumber);
    textarea.setAttribute("rows", "10");
    textarea.setAttribute("required", "");
    inputContainer.appendChild(textarea);

    // </div>
    allInputsContainer.appendChild(inputContainer);

    corpusNumber++;
}


function addImageInput(img_path = "") {
    let allInputsContainer = document.getElementById("all-inputs-container");

    // We wanna recreate this structure :
    // <div class="input-container">
    //     <label for="image-0[]">
    //             Contenu texte
    //                 <a class="btn delete-btn" onclick="deleteSection(this)">
    //                     <img src="/assets/icons/minus.svg" alt="Supprimer">
    //                     <div class="hover-msg">Supprimer cette section</div>
    //                 </a>
    //         </label>
    //     <div class="input all-image-attributes">
        
    //         <div class="image-attribute-container">
    //             <div class="image-attribute-name">
    //                 <div class="title">Fichier</div>
    //                 <img class="preview-icon" src="/assets/icons/preview.svg"></img>
    //                 <img class="preview" src="img_path"></img>
    //             </div>
    //             <div class="file-input-container">
    //                  <input class="btn" id="image-file" name="image[file]" type="file" required>
    //             </div>
           
    //         </div>

    //         <div class="image-attribute-container">
    //             <div class="image-attribute-name">
    //                 Alt
    //             </div>
    //             <input class="input" id="image-alt" name="image[alt]" type="text" maxlength="199" required>
    //         </div>

    //         <div class="image-attribute-container">
    //             <div class="image-attribute-name">
    //                 Légende
    //             </div>
    //             <input class="input" id="image-caption" name="image[caption]" type="text" maxlength="199">
    //         </div>

    //          <input type="hidden" id=prefill name="image[prefill]" value="0">

    //     </div>
    // </div>

    // <div class="input-container">
    let inputContainer = document.createElement("div");
    inputContainer.classList.add("input-container");

    //     <label for="image-i[]">Image</label>
    let label = document.createElement("label");
    label.textContent = "Image";
    label.setAttribute("for", "image-"+imageNumber+"[]");
    inputContainer.appendChild(label);

    //     <div class="btn delete-btn" onclick="deleteSection(this)">
    let deleteBtn = document.createElement("a");
    deleteBtn.classList.add("btn");
    deleteBtn.classList.add("delete-btn");
    deleteBtn.setAttribute("onclick", "deleteSection(this)");

    //         <img src="/assets/icons/minus.svg" alt="Supprimer">
    let img = document.createElement("img");
    img.setAttribute("src", "/assets/icons/minus.svg");
    img.setAttribute("alt", "Supprimer");
    deleteBtn.appendChild(img);

    //         <div class="hover-msg">Supprimer cette section</div>
    let hoverMsg = document.createElement("div");
    hoverMsg.classList.add("hover-msg");
    hoverMsg.textContent = "Supprimer cette section";
    deleteBtn.appendChild(hoverMsg);

    label.appendChild(deleteBtn);

    //     <div class="input all-image-attributes">
    let allImageAttributes = document.createElement("div");
    allImageAttributes.classList.add("input");
    allImageAttributes.classList.add("all-image-attributes");

    //         <div class="image-attribute-container">
    let imageAttributeContainer1 = document.createElement("div");
    imageAttributeContainer1.classList.add("image-attribute-container");

    //             <div class="image-attribute-name">
    let imageAttributeName1 = document.createElement("div");
    imageAttributeName1.classList.add("image-attribute-name");

    //                 <div class="title">Fichier</div>
    if (img_path != "") {
        let title = document.createElement("div");
        title.classList.add("title");
        title.textContent = "Image actuelle";
        imageAttributeName1.appendChild(title);

        //                 <img class="preview-icon" src="/assets/icons/preview.svg"></img>
        let previewIcon = document.createElement("img");
        previewIcon.classList.add("preview-icon");
        previewIcon.setAttribute("src", "/assets/icons/preview.svg");
        imageAttributeName1.appendChild(previewIcon);

        //                 <img class="preview" src="img_path"></img>
        let preview = document.createElement("img");
        preview.classList.add("preview");
        preview.setAttribute("src", img_path);
        imageAttributeName1.appendChild(preview);

        imageAttributeContainer1.appendChild(imageAttributeName1);
    } else {
        let title = document.createElement("div");
        title.classList.add("title");
        title.textContent = "Fichier";
        imageAttributeName1.appendChild(title);

        imageAttributeContainer1.appendChild(imageAttributeName1);

    }


    //             <div class="file-input-container">
    let fileInputContainer = document.createElement("div");
    fileInputContainer.classList.add("file-input-container");

    //                  <input class="btn" id="image-file" name="image-i[file]" type="file" required>
    let inputFile = document.createElement("input");
    inputFile.classList.add("btn");
    inputFile.setAttribute("id", "image-file-"+imageNumber);
    inputFile.setAttribute("name", "image-"+imageNumber+"[file]");
    inputFile.setAttribute("type", "file");
    inputFile.setAttribute("required", "");
    fileInputContainer.appendChild(inputFile);

    imageAttributeContainer1.appendChild(fileInputContainer);

    allImageAttributes.appendChild(imageAttributeContainer1);

    //         <div class="image-attribute-container">
    let imageAttributeContainer2 = document.createElement("div");
    imageAttributeContainer2.classList.add("image-attribute-container");
    
    //             <div class="image-attribute-name">
    let imageAttributeName2 = document.createElement("div");
    imageAttributeName2.classList.add("image-attribute-name");
    imageAttributeName2.textContent = "Alt";
    imageAttributeContainer2.appendChild(imageAttributeName2);

    //             <input class="input" id="image-alt" name="image-i[alt]" type="text" maxlength="199" required>
    let inputAlt = document.createElement("input");
    inputAlt.classList.add("input");
    inputAlt.setAttribute("id", "image-alt-"+imageNumber);
    inputAlt.setAttribute("name", "image-"+imageNumber+"[alt]");
    inputAlt.setAttribute("type", "text");
    inputAlt.setAttribute("maxlength", "199");
    inputAlt.setAttribute("required", "");
    imageAttributeContainer2.appendChild(inputAlt);

    allImageAttributes.appendChild(imageAttributeContainer2);

    //         <div class="image-attribute-container">
    let imageAttributeContainer3 = document.createElement("div");
    imageAttributeContainer3.classList.add("image-attribute-container");
    
    //             <div class="image-attribute-name">
    let imageAttributeName3 = document.createElement("div");
    imageAttributeName3.classList.add("image-attribute-name");
    imageAttributeName3.textContent = "Légende";
    imageAttributeContainer3.appendChild(imageAttributeName3);
    
    //             <input class="input" id="image-caption" name="image-i[caption]" type="text" maxlength="199">
    let inputCaption = document.createElement("input");
    inputCaption.classList.add("input");
    inputCaption.setAttribute("id", "image-caption-"+imageNumber);
    inputCaption.setAttribute("name", "image-"+imageNumber+"[caption]");
    inputCaption.setAttribute("type", "text");
    inputCaption.setAttribute("maxlength", "199");
    imageAttributeContainer3.appendChild(inputCaption);

    allImageAttributes.appendChild(imageAttributeContainer3);
    
    //          <input type="hidden" id=prefill name="image[prefill]" value="0">
    let prefill = document.createElement("input");
    prefill.setAttribute("type", "hidden");
    prefill.setAttribute("id", "prefill-"+imageNumber);
    prefill.setAttribute("name", "image-"+imageNumber+"[prefill]");
    prefill.setAttribute("value", "-1");
    allImageAttributes.appendChild(prefill);

    //     </div>
    
    inputContainer.appendChild(allImageAttributes);

    // </div>
    allInputsContainer.appendChild(inputContainer);

    imageNumber++;
}


// To delete a section
function deleteSection(element) {
    let elementToDelete = element.parentNode.parentNode;
    elementToDelete.remove();
}


// To fill an input
function fillInput(element, index, content, prefill = "no") {
	
	if (element == "image") {

        let imageToFill = document.getElementById("image-file-"+index);
		let altToFill = document.getElementById("image-alt-"+index);
		let captionToFill = document.getElementById("image-caption-"+index);

        if (prefill == "yes") {

            // The pre filled image is not required anymore.
            imageToFill.removeAttribute("required");
            // We set the prefill value to 1
            let prefill = document.getElementById("prefill-"+index);
            prefill.value = index;

        }

		altToFill.value = content[1].replace(/\\/g, '');
		captionToFill.value = content[2].replace(/\\/g, '');



	} else {

		let elementToFill = document.getElementById(element+"-"+index);
		elementToFill.value = content.replace(/\\/g, '');

	}
}