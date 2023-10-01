<body class="h-full">

    <div class="min-h-full">

        <?php require_once basePath('views/components/header.php') ?>
        <?php require_once basePath('views/components/nav.php') ?>
        <?php require_once basePath('views/components/banner.php') ?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <ul>
                    <?php foreach ($notes as $note) : ?>

                        <li>
                            <a href="/note?id=<?= $note['id'] ?>" class='text-blue-500 hover:underline'>
                                <?=
                                // to avoid html to run on our website 
                                // so it will run like pure text
                                htmlspecialchars($note['body']);
                                ?>
                            </a>
                        </li>

                    <?php endforeach; ?>
                </ul>


                <a href="/notes/create" class="rounded-md mt-4 inline-block bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">create note</a>

            </div>
        </main>

        <?php require_once basePath('views/components/footer.php');
