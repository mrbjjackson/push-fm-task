<?php 
require 'vendor/autoload.php';

$artistID = $_GET['id'];

if ($artistID == '')
$artistID = '2oyU4eToyQkxAFjkB3blsi';

$session = new SpotifyWebAPI\Session(
    '87ee9f3be4db430ba00cc6e25968a1cf',
    '658572e540474af5a2c6703ce5a5cf35'
);

$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

$error = '';
try {

  $artist = $api->getArtists([$artistID]);
  $artist = $artist->artists[0];
  
  $relatedArtists = $api->getArtistRelatedArtists($artistID);
  $relatedArtists = $relatedArtists->artists;
  
  $topTracks = $api->getArtistTopTracks($artistID, [
    'country' => 'gb',
  ]);
  $topTracks = $topTracks->tracks;

} catch (Exception $e) {
  $error = 'Spotify API Error: ' . $e->getCode(); // Will be 404
}

?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="automated digital marketing, music makers, content creators, cross-platform">
<meta name="description" content="Push.fm is a marketing and promotional platform for digital content creators, helping them to build a strong fanbase. Create smart fanlinks, download gates and presaves with detailed analytics and meaningful insights.">
<meta name="author" content="PUSH">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="v8g5bIr4Fd2QwsNd4sRY0IpYtoI3dzRA4pPzWW3e">
<meta property="og:url" content="https://push.fm">
<meta property="og:type" content="website">
<meta property="og:title" content="Push.fm">
<meta property="og:image" content="https://d29xpkeqnsbaz3.cloudfront.net/43c6033a-6f4b-437d-9fce-c4876b2bae3c/images/banner.jpg">
<meta property="og:description" content="Push.fm is a marketing and promotional platform for digital content creators, helping them to build a strong fanbase. Create smart fanlinks, download gates and presaves with detailed analytics and meaningful insights.">
<title>Ben Jackson - Push FM task</title>
<link rel="icon" type="image/png" href="https://d29xpkeqnsbaz3.cloudfront.net/43c6033a-6f4b-437d-9fce-c4876b2bae3c/favicon.png">
<link href="./resources/fonts.css" rel="stylesheet">
<link href="./resources/app.css" rel="stylesheet">
<link href="./resources/downloadedstyles.css" rel="stylesheet">
<link href="./resources/style.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


</head>

<body class="overflow-x-hidden">
<div class="overflow-visible sidebar-closed">

<?php 
include('header.php');
include('aside.php');
?>

<main class="mt-16 lg:mt-20 overflow-y-visible overflow-x-hidden lg:overflow-x-visible ml-menu-sm p-8" >
  <div id="app"></div>
</main>


</body>
</html>

<script>
    var phpArtist = <?php echo json_encode($artist); ?>;
    var phpRelatedArtists = <?php echo json_encode($relatedArtists); ?>;
    var phpError = <?php echo json_encode($error); ?>;
    var phpTopTracks = <?php echo json_encode($topTracks); ?>;
</script>

<script src="./bundle.js"></script>

