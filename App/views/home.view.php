<?= loadPartial('navbar') ?>
<?= loadPartial('head') ?>
<?= loadPartial('showcase-search') ?>
<?= loadPartial('top-banner') ?>

<!-- Job Listings -->
<section>
  <div class="container mx-auto p-4 mt-4">
    <div class="text-center text-2xl mb-4 font-bold border border-gray-300 p-3 rounded-lg">Recent Jobs</div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6" >
      <?php foreach ($listings as $listing) : ?>
        <!-- Job Listing 1: Software Engineer -->
        <div class="rounded-lg shadow-md bg-white">
          <div class="p-4">
            <h2 class="text-1xl font-bold"><?= $listing->title ?></h2>
            <p class="text-gray-700 text-1xl mt-2">
              <?= $listing->description ?>
            </p>
            <ul class="my-4 bg-gray-100 p-4 rounded">
              <li class="mb-2">Salary:<?= formatSalary($listing->salary) ?></li>
              <li class="mb-2">
                Location: <?= $listing->city ?>, <?= $listing->state ?>
                <!-- <span class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2">Local</span> -->
              </li>

              <?php if (!empty($listing->tags)) : ?>
                <li class="mb-2">
                  Tags: <?= $listing->tags ?>
                </li>
              <?php endif; ?>

            </ul>
            <a href="/test-project/workopia/public/listings/<?= $listing->id ?>" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
              Details
            </a>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
    <a href="/test-project/workopia/public/listings" class="block text-xl text-center">
      <i class="fa fa-arrow-alt-circle-right"></i>
      Show All Jobs
    </a>
</section>

<?= loadPartial('bottom-banner') ?>
<?= loadPartial('footer') ?>