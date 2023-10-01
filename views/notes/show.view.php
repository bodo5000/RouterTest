<body class="h-full">

    <div class="min-h-full">

        <?php require_once basePath('views/components/header.php') ?>
        <?php require_once basePath('views/components/nav.php') ?>
        <?php require_once basePath('views/components/banner.php') ?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">


                <p class="text-lg mb-2 bold"><?= htmlspecialchars($note['body']) ?></p>


                <form action="" method="post" class="mt-6 ">
                    <input type="hidden" name='_method' value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id']; ?>">
                    <a href="/notes/edit?id=<?= $note['id'] ?>" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>

                    <button type="submit" class="text-sm text-white bg-red-600 p-2 rounded hover:bg-red-500 duration-500">
                        Delete
                    </button>

                    <a href="/notes" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                </form>


            </div>
        </main>

        <?php require_once basePath('views/components/footer.php');
