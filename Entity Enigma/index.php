<?php
$comments = [
    ['message' => 'Welcome to our secure pet community! 🐾'],
    ['message' => 'Share your pet experiences in XML format! 📝']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Haven | Community Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="hero">
            <h1>Welcome to Pet Haven</h1>
            <p>Your pet's favorite secure community portal</p>
        </div>

        <div class="products">
            <h2 class="section-title">Recent Activity</h2>
            <div class="grid">
                <div class="card">
                    <img src="https://lyka.com.au/opengraph.jpg" alt="Dog Food">
                    <h3>New Nutrition Guide</h3>
                    <p>Updated pet food safety standards</p>
                </div>
                <div class="card">
                    <img src="https://www.purina-arabia.com/sites/default/files/2020-12/Article%20teaser%20cat%20games.jpg" alt="Cat Toy">
                    <h3>Playtime Updates</h3>
                    <p>Latest interactive toy certifications</p>
                </div>
            </div>
        </div>

        <div class="comment-section">
            <h2 class="section-title">Pet Community Comments</h2>
            <form action="process.php" method="POST" class="xml-form">
                <textarea 
                    name="xml" 
                    class="xml-editor"
                    placeholder='<?= "<?xml version=\"1.0\"?>\n<comment>\n    <message>Your message here</message>\n</comment>" ?>'
                ></textarea>
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paw"></i> Submit Comment
                </button>
            </form>
            
            <div class="grid" style="margin-top: 2rem;">
                <?php foreach ($comments as $comment): ?>
                    <div class="card">
                        <div class="comment-bubble">
                            <p><?= htmlspecialchars($comment['message']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
