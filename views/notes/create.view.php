<body class="h-full">

    <div class="min-h-full">
        <?php require_once basePath('views/components/header.php') ?>
        <?php require_once basePath('views/components/nav.php') ?>
        <?php require_once basePath('views/components/banner.php') ?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <form method="post">
                    <div class="col-span-full">
                        <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                        <div class="mt-2">
                            <textarea id="about" name="note" rows="3" placeholder="write your note ..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['note'] ?? '' ?></textarea>

                            <!-- to validate the note textArea not empty -->
                            <?php if (isset($errors['note'])) : ?>
                                <p class="text-red-600 text-xs mt-2 font-bold"> <?= $errors['note'] ?> </p>
                            <?php endif; ?>

                        </div>
                        <p class="my-3 text-sm leading-6 text-gray-600">here you are going to save your note.</p>
                    </div>

                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                    <a href="/notes" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                </form>
            </div>
        </main>

        <?php require_once basePath('views/components/footer.php');
