<?php partial('header.php'); ?>
<?php partial('nav.php'); ?>
<?php partial('banner.php', ['heading' => $heading]); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>!</p>
    </div>
  </main>

<?php partial('footer.php'); ?>
