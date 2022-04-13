<?php
include 'includes/header.php';
?>
<?php
//test insert from array = db emulation
//  $feedbacks = [
//   [
//     'id' => 1,
//     'name' => 'Sara Parker',
//     'email' => 'Sara@mail.ru',
//     'feedb' => 'Your social media is so-so',
//   ],
//   [
//     'id' => 2,
//     'name' => 'Mark Twen',
//     'email' => 'Mark@mail.ru',
//     'feedb' => 'Your social is like my good old book',
//   ],
// ];

//fetch from Mysql db table:
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($connect, $sql);
//recieve associative array as above
$feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($feedbacks);
?>

    <h2>Feedback</h2>
<?php 
if(empty($feedbacks)){
  echo "<p class='lead mt3'>There is no feedback</p>";
}
?>

<?php 
foreach($feedbacks as $item): ?>
    <div class="card my-3 w-75">
      <div class="card-body text-center">
        <?php echo $item['feedb']; ?>
        <div class="text-secondary mt-2">
          By <?php echo $item['name']; ?>
          on <?php echo $item['date']; ?>
        </div>
      </div>
    </div>
<?php endforeach; ?>

<?php
include 'includes/footer.php';
?>

