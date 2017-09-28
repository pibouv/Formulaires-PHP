<?php
if ($_POST)
{
    $errors = array();
    $regexPhone= "/^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/";
    $regexName= "/^[A-Z][-'a-zA-Z]+,?\s[A-Z][-'a-zA-Z]{0,19}$/";
    $regexMail= "/^[\w\-\+]+(\.[\w\-]+)*@[\w\-]+(\.[\w\-]+)*\.[\w\-]{2,4}$/";
    if ((!preg_match($regexName, ($_POST['user_name']))))
    {
        $errors['user_name1'] = "&#9888 Vous devez renseigner un nom valide";
    }
    if ((!preg_match($regexPhone, ($_POST['user_phone']))))
    {
        $errors['user_phone1'] = "&#9888 Vous devez renseigner un numéro de téléphone valide";
    }
    if ((!preg_match($regexMail, ($_POST['user_email']))))
    {
        $errors['user_email1'] = "&#9888 Vous devez renseigner une adresse mail valide";
    }
    if (empty($_POST['user_topic']))
    {
        $errors['user_topic1'] = "&#9888 Votre message doit comporter un sujet";
    }
    if (empty($_POST['user_message']))
    {
        $errors['user_message1'] = "&#9888 Vous devez entrer un message";
    }
    if (count($errors) == 0)
    {
        echo 'Votre nom est ' . $_POST['user_name'] . '<br />';
        echo 'Votre numéro de téléphone est ' . $_POST['user_phone'] . '<br />';
        echo 'Votre adresse mail est ' . $_POST['user_email'] . '<br />';
        echo 'Vous nous contactez car ' . $_POST['user_topic'] . '<br />';
        echo 'Vous nous avez laissé le message suivant : ' . $_POST['user_message'];
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<form action="form.php" method="post">
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="user_name"
               value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name']; ?>"
               pattern="^[A-Z][-'a-zA-Z]+,?\s[A-Z][-'a-zA-Z]{0,19}$" />
        <p class="error_message"><?php if(isset($errors['user_name1'])) echo $errors['user_name1']; ?></p>
    </div>
    <div>
        <label for="phone">&#9742 :</label>
        <input type="text" id="phone" name="user_phone"
               value="<?php if(isset($_POST['user_phone'])) echo $_POST['user_phone']; ?>"
               pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" />
        <p class="error_message"><?php if(isset($errors['user_phone1'])) echo $errors['user_phone1']; ?></p>
    </div>
    <div>
        <label for="mail">@ :</label>
        <input type="email" id="courriel" name="user_email"
               value="<?php if(isset($_POST['user_email'])) echo $_POST['user_email']; ?>"
               pattern="^[\w\-\+]+(\.[\w\-]+)*@[\w\-]+(\.[\w\-]+)*\.[\w\-]{2,4}$" />
        <p class="error_message"><?php if(isset($errors['user_email1'])) echo $errors['user_email1']; ?></p>
    </div>
    <div>
        <label for="sujet">Sujet :</label>
        <select id="sujet" name="user_topic">
            <option value=""></option>
            <option value="Mon formulaire est pété" <?php if($_POST) if($_POST['user_topic']=='1') echo 'selected="selected"';?> >JPP de mon formulaire</option>
            <option value="Mon formulaire m'a rendu fou" <?php if($_POST) if($_POST['user_topic']=='2') echo 'selected="selected"';?>>Mon formulaire m'a rendu fou</option>
            <option value="Je rêve de mon formulaire" <?php if($_POST) if($_POST['user_topic']=='3') echo 'selected="selected"';?>>Je rêve de mon formulaire</option>
            <option value="Mon formulaire me regarde quand je dors" <?php if($_POST) if($_POST['user_topic']=='4') echo 'selected="selected"';?>>Mon formulaire me regarde quand je dors</option>
        </select>
        <p class="error_message"><?php if(isset($errors['user_topic1'])) echo $errors['user_topic1']; ?></p>
    </div>
    <div>
        <label for="message">Message :</label>
        <textarea id="message" name="user_message"><?php if(isset($_POST['user_message'])) echo $_POST['user_message']; ?></textarea>
        <p class="error_message"><?php if(isset($errors['user_message1'])) echo $errors['user_message1']; ?></p>
    </div>
    <div class="button">
        <button type="submit">Envoyer votre message</button>
    </div>
</form>

</body>
</html>