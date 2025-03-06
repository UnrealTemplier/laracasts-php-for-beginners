<?php partial('header.php'); ?>
<?php partial('nav.php'); ?>
<?php partial('banner.php', ['heading' => $heading]); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <p class="mb-4 text-xs text-blue-600 hover:text-blue-800">
        <a href="/notes">Back to notes</a>
      </p>

      <p class=""><?= htmlspecialchars($note['body']) ?></p>

      <div class="mt-4 flex items-center justify-start gap-x-2">
        <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
        >
          Edit
        </a>
      </div>

    </div>
  </main>

<?php partial('footer.php'); ?>