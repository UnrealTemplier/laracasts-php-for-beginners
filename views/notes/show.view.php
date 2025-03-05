<?php partial('header.php'); ?>
<?php partial('nav.php'); ?>
<?php partial('banner.php', ['heading' => $heading]); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <p class="mb-4 text-xs text-blue-600 hover:text-blue-800">
        <a href="/notes">Back to notes</a>
      </p>

      <p class=""><?= htmlspecialchars($note['body']) ?></p>

      <form action="/note" method="POST" class="mt-6">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <button type="submit" class="rounded-md bg-red-500 px-3 py-2 text-xs font-semibold text-white shadow-xs hover:bg-red-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">Delete</button>
      </form>

    </div>
  </main>

<?php partial('footer.php'); ?>