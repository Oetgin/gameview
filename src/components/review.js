// Edit review
function editReview(review_id) {
    // Transform the review into a form
    const review = document.getElementById(`review-${review_id}`);

    let pp = review.getElementsByClassName('reviewer-pp')[0].innerHTML;
    
    review.innerHTML = `
    <form id="form-review-${review_id}" class="form" action="/src/actions/updateReview.php?id=${review_id}" method="post">
        <div class="form-group">
            <label for="rating-${review_id}">Note</label>
            <input type="number" class="form-control" id="rating-${review_id}" min="0" max="100" value="${review.dataset.rating}" name="rating-${review_id}">
        </div>
        <div class="form-group">
            <label for="title-${review_id}">Titre</label>
            <input type="text" class="form-control" id="title-${review_id}" value="${review.dataset.title}" name="title-${review_id}">
        </div>
        <div class="form-group">
            <label for="content-${review_id}">Contenu</label>
            <textarea class="form-control" id="content-${review_id}" name="content-${review_id}">${review.dataset.content}</textarea>
        </div>
        <div class="form-group">
            <label for="played_time-${review_id}">Temps de jeu (en heures)</label>
            <input type="number" class="form-control" id="played_time-${review_id}" min="0" value="${review.dataset.played_time}" name="played_time-${review_id}">
        </div>
        <div class="form-group">
            <button class="button" type="submit">Sauvegarder</button>
            <button class="button" type="button" onclick="cancelEdit(${review_id})">Annuler</button>
        </div>
        <div class="data hidden">
            <div id="profile-picture" class="profile-picture">${pp}</div>
        </div>
    </form>
    `;
}

function cancelEdit(review_id) {
    const review = document.getElementById(`review-${review_id}`);
    
    let rating = review.dataset.rating;
    let title = review.dataset.title;
    let content = review.dataset.content;
    let background_class = review.dataset.background_class;
    let date = review.dataset.date;
    let reviewer_id = review.dataset.reviewer_id;
    let reviewer_name = review.dataset.reviewer_name;
    let played_time = review.dataset.played_time;
    let game_name = review.dataset.game_name;
    let article_id = review.dataset.article_id;
    let pp = review.getElementsByClassName('profile-picture')[0].innerHTML;

    let canedit = review.dataset.canedit;
    let candelete = review.dataset.candelete;

    review.innerHTML = `
    ${candelete?
    `<div class="delete-review">
        <a class="delete-btn" href="/src/actions/deleteReview.php?id=${review_id}&article-id=${article_id}">
            <img src="/assets/icons/minus.svg" alt="Delete comment">
            <div class="hover-msg">Supprimer ce commentaire</div>
        </a>
        ${canedit?
        `<button class="edit-btn" onclick="editReview(${review_id})">
            <img src="/assets/icons/edit.svg" alt="Edit comment">
            <div class="hover-msg">Modifier ce commentaire</div>
        </button>`
        :
        ''}
        </div>`
    :''}
    <div class="grade ${background_class}">
        ${rating}
    </div>

    <div class="review-title">
        ${title}
    </div>

    <div class="review-content">
        ${content}
    </div>

    <div class="review-divider"></div>

    <div class="reviewer-wrapper">
        <div class="review-date">
            Le ${date} par :
        </div>

        <div class="reviewer-container">
            <a class="reviewer-pp profile-btn btn" href="/src/pages/profile.php?id=${reviewer_id}">
                ${pp}
            </a>
            
            <div class="reviewer-info">
                <a class="reviewer-name btn" href="/src/pages/profile.php?id=${reviewer_id}">${reviewer_name}</a>
                <div class="reviewer-time">A joué <span>${played_time}h</span> à ${game_name}</div>
            </div>
        </div>
    </div>
    `;
}
