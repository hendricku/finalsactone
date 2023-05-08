<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Pos Collection Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .card {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    
    <div class="container">
    <div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-8">
      <form>
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search">
          <button class="btn btn-primary">Search</button>
        </div>
      </form>
    </div>
  </div>
</div>

        <?php
        require_once __DIR__.'/vendor/autoload.php';
        use Google\Cloud\Firestore\FirestoreClient;
        $db = new FirestoreClient([
            'keyFilePath' => 'keys/infoact-b0cbe-firebase-adminsdk-rpiwx-70526df18a.json',
            'projectId' => 'infoact-b0cbe'
        ]);
        $blogsRef = $db->collection('blogs');
       /*
        $blogsRef->add([
            'title' => 'The Tenuous Promise of the Substack Dream',
            'content' => 'I used to write a column for Macworld magazine. <br>People trying to butter me up would tell me they bought the magazine just to read my modest contribution.<br> I didn’t believe them, but it got me thinking.',
            'reactions' => 99,
            'comments' => 4
        ]);

        $blogsRef->add([
            'title' => 'Meet the Coolest 84-Year-Old on the Internet',
            'content' => 'Photographers dont need exotic locations, expensive gear or professional models to <br>make good pictures. As Zoe Spawton demonstrates each day with her blog What Ali Wore, <br>being resourceful in ones everyday life is more than enough. ',
            'reactions' => 99,
            'comments' => 4
        ]);
        $blogsRef->add([
            'title' => 'Expert Twitter Only Goes So Far. Bring Back Blogs',
            'content' => 'LATE LAST MONTH I did an interview with GQ about technology and the coronavirus pandemic. <br>“This is a little bit flippant,” I told the reporter,<br> “but in terms of closing things down for public health, one of the big boosts they could make would probably be shutting down Twitter.” ',
            'reactions' => 54,
            'comments' => 4
        ]);
        $blogsRef->add([
            'title' => 'A Short History of Blaming Hackers For Pretty Much Everything',
            'content' => 'Joy Reid may have very well been the target of a malicious breach. Or shes just the latest person to blame hackers for her past mistakes.',
            'reactions' => 2,
            'comments' => 4
        ]);
    
        $blogsRef->add([
            'title' => 'So Long Blogging. Hello—Yep, Were Going to Say It—Plogging',
            'content' => 'Blogging is back. Except this time its on platforms',
            'reactions' => 9,
            'comments' => 4
        ]);
    
        $blogsRef->add([
            'title' => 'How a Food Blog Shaped the Way We Use the Internet',
            'content' => 'WHEN Epicurious launched in 1995, there were few websites on the Information Superhighway where you could find recipes for chocolate cake and shrimp scampi. There were very few websites, period.<br>The Internet was an infant, crawling ever so slowly (remember dial up?) into our lives.',
            'reactions' => 2,
            'comments' => 4
        ]);
        */
        $blogs = $blogsRef->documents();
        foreach ($blogs as $blog) {
            echo '<div class="card">
                <div class="card-header">
                    <h5 class="card-title">' . $blog['title'] . '</h5>
              
                <div class="card-body">
                    <p class="card-text">' . $blog['content'] . '</p>
                    <div class="row">
                        <div class="col-4">
                            <p>Reactions: ' . $blog['reactions'] . '</p>
                        </div>
                        <div class="col-4">
                            <p>Comments: ' . $blog['comments'] . '</p>
                        </div>
                        <div class="col-4">
                            <a href="adding.php?id=' . $blog->id() . '"><i class="bi-heart-fill"></i></a>
                        </div>
                    </div>
                </div>

            </div>';
        } 
        ?>
    </div>
</body>
</html>
