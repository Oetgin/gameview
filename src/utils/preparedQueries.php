<?php
// Remember to bind statements before executing them

$mysqli = connectionDB();

// REGISTER
$user_exists_query = "SELECT * FROM user WHERE username = ? OR email = ?";
$insert_user_query = "INSERT INTO user (username, email, password, surname, name, birthdate) VALUES (?, ?, ?, ?, ?, ?)";

$user_exists_prepared = mysqli_prepare($mysqli, $user_exists_query);
$insert_user_prepared = mysqli_prepare($mysqli, $insert_user_query);


// LOGIN
$user_login_query = "SELECT * FROM user WHERE username = ?";

$user_login_prepared = mysqli_prepare($mysqli, $user_login_query);


// ARTICLES
$get_articles_query = "SELECT * FROM article ORDER BY `date` DESC";
$insert_article_query = "INSERT INTO article (title, content, authorID_article) VALUES (?, ?, ?)";
$delete_article_query = "DELETE FROM article WHERE id = ?";
$article_search_query = "SELECT article.id FROM article 
INNER JOIN game ON article.gameID_article = game.id
WHERE article.content LIKE ? or article.title LIKE ? or article.id LIKE ? or article.date LIKE ? OR article.rating LIKE ? OR article.points LIKE ? OR authorID_article LIKE ? OR game.title LIKE ? or game.id LIKE ? or game.synopsis LIKE ? OR game.releaseDate LIKE ? OR game.price LIKE ?
ORDER BY `date` DESC";
$article_info_query = "SELECT 
article.id as id, article.title as title, article.description as `description`, article.rating as rating, user.username as username, user.role as `role`, user.id as authorId, game.title as gameTitle, game.id as gameId 
FROM article
INNER JOIN game ON article.gameID_article = game.id
INNER JOIN user ON article.authorID_article = user.id
WHERE article.id = ?
ORDER BY article.date DESC";

$insert_article_prepared = mysqli_prepare($mysqli, $insert_article_query);
$delete_article_prepared = mysqli_prepare($mysqli, $delete_article_query);
$article_search_prepared = mysqli_prepare($mysqli, $article_search_query);
$article_info_prepared = mysqli_prepare($mysqli, $article_info_query);


// GAMES
$game_platform_query = "SELECT gameplatforms.platform FROM game INNER JOIN gameplatforms ON gameplatforms.gameID_platform = game.id WHERE game.id = ?";

$game_platform_prepared = mysqli_prepare($mysqli, $game_platform_query);


// COMMENTS
$get_comments_query = "SELECT * FROM comment WHERE articleID_comment = ? ORDER BY creationDate DESC";
$insert_comment_query = "INSERT INTO comment (content, authorID_comment, articleID_comment) VALUES (?, ?, ?)";
$delete_comment_query = "DELETE FROM comment WHERE id = ?";

$get_comments_prepared = mysqli_prepare($mysqli, $get_comments_query);
$insert_comment_prepared = mysqli_prepare($mysqli, $insert_comment_query);
$delete_comment_prepared = mysqli_prepare($mysqli, $delete_comment_query);


// DELETE ACCOUNT
$delete_articles_query = "DELETE FROM article WHERE authorID_article = ?";
$delete_comments_query = "DELETE FROM comment WHERE authorID_comment = ?";
$delete_user_query = "DELETE FROM user WHERE username = ? AND password = ?";

$delete_articles_prepared = mysqli_prepare($mysqli, $delete_articles_query);
$delete_comments_prepared = mysqli_prepare($mysqli, $delete_comments_query);
$delete_user_prepared = mysqli_prepare($mysqli, $delete_user_query);


// USER INFO
$user_info_query = "SELECT * FROM user WHERE id = ?";
$user_comments_query = "SELECT * FROM comment WHERE authorID_comment = ?";
$user_articles_query = "SELECT * FROM article WHERE authorID_article = ?";

$user_info_prepared = mysqli_prepare($mysqli, $user_info_query);
$user_comments_prepared = mysqli_prepare($mysqli, $user_comments_query);
$user_articles_prepared = mysqli_prepare($mysqli, $user_articles_query);