<?php partial('header.php'); ?>
<?php partial('nav.php'); ?>
<?php partial('banner.php', ['heading' => $heading]); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <form method="POST">
        <div class="space-y-12">
          <div>

            <div class="col-span-full">
              <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
              <div>
                <input
                  type="text"
                  name="title"
                  id="title"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                  placeholder="Your note title"
                ><?= $_POST['title'] ?? '' ?></input>
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
                ><?= $_POST['body'] ?? '' ?></textarea>
              </div>

                <?php if (isset($errors['body'])): ?>
                  <p class="text-red-500 text-xs mt-1 ml-2">
                      <?= $errors['body'] ?>
                  </p>
                <?php endif; ?>

            </div>
          </div>
        </div>

        <div class="mt-4 flex items-center justify-start gap-x-6">
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
        </div>
      </form>

    </div>
  </main>

<?php partial('footer.php'); ?>