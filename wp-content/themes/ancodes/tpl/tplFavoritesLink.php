<?php
$this->GetCount();
$count = $this->GetCount()+0;
if($this->GetCount()>0)
{

    ?>
    <a href="/favorites/" class="favorites">
        <span>Избранное <span class="counter"><?php echo $count; ?></span></span>
    </a>
    <?php
}
else
{
    ?>
    <span href="/favorites/" class="favorites">
        <span>Избранное <span class="counter"></span></span>
    </span>
    <?php
}