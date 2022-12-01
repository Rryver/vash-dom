<?php

/**
 * @var \yii\web\View $this
 * @var \app\models\Step[] $steps
 */

?>

<?php if ($steps) { ?>
<section class="steps">
    <div class="container">
        <h2 class="heading-36">Как мы работаем</h2>
        <?php foreach ($steps as $key => $step) { ?>
            <?php if ($key % 2 == 0) { ?>
                <div class="step">
                    <div class="step__content col-md-8">
                        <div class="step__title"><?= $step->title ?></div>
                        <div class="step__text"><?= $step->description ?></div>
                    </div>
                    <div class="step__image-container col-md-4">
                        <img class="step__image" src="<?= $step->image ?>" alt="step">
                    </div>
                </div>
            <?php } else { ?>
                <div class="step">
                    <div class="step__image-container col-md-4">
                        <img class="step__image" src="<?= $step->image ?>" alt="step">
                    </div>
                    <div class="step__content col-md-8">
                        <div class="step__title"><?= $step->title ?></div>
                        <div class="step__text"><?= $step->description ?></div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</section>
<?php } ?>