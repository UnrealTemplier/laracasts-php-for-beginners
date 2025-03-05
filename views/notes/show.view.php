<?php partial('header.php'); ?>
<?php partial('nav.php'); ?>
<?php partial('banner.php', ['heading' => $heading]); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <p class="mb-4 text-xs text-blue-600 hover:text-blue-800">
        <a href="/notes">Back to notes</a>
      </p>

      <p class=""><?= htmlspecialchars($note['body']) ?></p>

    </div>
  </main>

<?php partial('footer.php'); ?>