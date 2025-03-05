<?php partial('header.php'); ?>
<?php partial('nav.php'); ?>
<?php partial('banner.php', ['heading' => $heading]); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <ul>
          <?php foreach ($notes as $note): ?>
            <li class="mt-2 mb-2 text-blue-600 hover:text-blue-800">
              <a href="/note?id=<?= $note['id'] ?>">
                  <?= htmlspecialchars($note['title']) ?>
              </a>
            </li>
          <?php endforeach; ?>
      </ul>

      <p class="mt-8 text-blue-600 hover:text-blue-800">
        <a href="/notes/create">Create note</a>
      </p>

    </div>
  </main>

<?php partial('footer.php'); ?>