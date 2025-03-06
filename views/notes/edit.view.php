<?php partial('header.php'); ?>
<?php partial('nav.php'); ?>
<?php partial('banner.php', ['heading' => $heading]); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <form action="/note" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <div class="space-y-12">
          <div>

            <div class="col-span-full">
              <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
              <div>
                <input
                  type="text"
                  name="title"
                  id="title"
                  value="<?= $note['title'] ?? '' ?>"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                  placeholder="Your note title"
                >
              </div>

                <?php if (isset($errors['title'])): ?>
                  <p class="text-red-500 text-xs mt-1 ml-2">
                      <?= $errors['title'] ?>
                  </p>
                <?php endif; ?>

              <label for="body" class="mt-4 block text-sm/6 font-medium text-gray-900">Content</label>
              <div>
                <textarea
                  name="body"
                  id="body"
                  rows="3"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                  placeholder="Your note content"
                ><?= $note['body'] ?? '' ?></textarea>
              </div>

                <?php if (isset($errors['body'])): ?>
                  <p class="text-red-500 text-xs mt-1 ml-2">
                      <?= $errors['body'] ?>
                  </p>
                <?php endif; ?>

            </div>
          </div>
        </div>

        <div class="mt-4 flex items-center justify-start gap-x-2">

          <a href="/notes" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
          >
            Cancel
          </a>

          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
          >
            Update
          </button>

        </div>
      </form>

      <form action="/note" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <div class="mt-10 flex items-center justify-start gap-x-2">

          <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-xs font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
          >
            Delete
          </button>

        </div>
      </form>

    </div>
  </main>

<?php partial('footer.php'); ?>