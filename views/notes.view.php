<?php require 'partials/header.php'; ?>
<?php require 'partials/nav.php'; ?>
<?php require 'partials/banner.php'; ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <ul>
          <?php foreach ($notes as $note): ?>
            <li class="mt-2 mb-2 text-blue-600 hover:text-blue-800">
              <a href="/note?id=<?= $note['id'] ?>">
                  <?= substr(htmlspecialchars($note['body']), 0, 50) . '...' ?>
              </a>
            </li>
          <?php endforeach; ?>
      </ul>

      <p class="mt-8 text-blue-600 hover:text-blue-800">
        <a href="/notes/create">Create note</a>
      </p>

    </div>
  </main>

<?php require 'partials/footer.php'; ?>