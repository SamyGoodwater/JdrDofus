<?php
// Obligatoire
    if(!isset($obj)) {throw new Exception("obj is not set");}else{if(!is_object($obj)) {throw new Exception("obj is not set");}}

// Conseillé
    if(!isset($user)) {$user = ControllerConnect::getCurrentUser();}else{if(get_class($user) != "User") {$user = ControllerConnect::getCurrentUser();}}
    if(!isset($bookmark_icon)) {$bookmark_icon =  Style::ICON_REGULAR;}else{if(!is_string($bookmark_icon)) {$bookmark_icon =  Style::ICON_REGULAR;}}
    if(!isset($style)){ $style = new Style; }else{ if(!get_class($style) == "Style"){ $style = new Style; } }

    $classe = $obj->getClasse(Content::FORMAT_OBJECT);
?>

<div id="<?=$style->getId()?>" class="resume <?=$style->getClass()?>" style="width: <?=$style->getSize()?>px;">
    <div style="position:relative;">
        <div ondblclick="Npc.open('<?=$obj->getUniqid()?>');" class="card-hover-linked card p-2 m-1 border-secondary-d-2 border" >
            <div class="d-flex flew-row flex-nowrap justify-content-start">
                <div>
                    <?=$obj->getFile('logo', new Style(['format' => Content::FORMAT_VIEW, "class" => "img-back-50"]))?>
                </div>
                <div class="m-1">
                    <p class="bold ms-1"><?=$obj->getName()?></p>
                    <div class="d-flex align-items-baseline">
                        <h6>Classe : <?=$obj->getClasse(Content::FORMAT_OBJECT)->getName()?></h6>
                        <div class="ms-3 text-center short-badge-150"><?=$obj->getLevel(Content::FORMAT_BADGE)?></div>
                    </div>
                </div>
                <div class="ms-auto align-self-end resume-rapid-menu">
                    <a onclick='User.toogleBookmark(this);' data-classe='npc' data-uniqid='<?=$obj->getUniqid()?>'><i class='<?=$bookmark_icon?> fa-bookmark text-main-d-2 text-main-hover'></i></a>
                    <p><a class="btn-text-secondary" title="Afficher les sorts" onclick="Npc.getSpellList('<?=$obj->getUniqid()?>');"><i class="fa-solid fa-magic"></i></a></p>
                    <p><a data-bs-toggle='tooltip' data-bs-placement='top' title='Générer un pdf' class='text-red-d-2 text-red-l-3-hover' target='_blank' href='index.php?c=npc&a=getPdf&uniqid=<?=$obj->getUniqid()?>'><i class='fa-solid fa-file-pdf'></i></a></p>
                </div>
            </div>
            <div class="justify-content-center d-flex short-badge-150 flex-wrap"><?=$obj->getTrait(Content::FORMAT_BADGE)?></div>
            <div class="card-hover-showed">
                <p class="size-0-8 short-badge-150">
                    <?=$obj->getAge(Content::FORMAT_BADGE)?>
                    <?=$obj->getSize(Content::FORMAT_BADGE)?>
                    <?=$obj->getWeight(Content::FORMAT_BADGE)?>
                </p>
                <p class="size-0-8"><span class="size-0-8 text-grey-d-2">Alignement : </span><?=$obj->getAlignment()?></p>
                <p class="size-0-8"><span class="size-0-8 text-grey-d-2">Historique : </span><?=$obj->getHistorical()?></p>
                <div class="d-flex justify-content-around flex-wrap">
                    <div class="col-auto">
                        <div><?=$obj->getPa(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getPm(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getPo(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getIni(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getLife(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getTouch(Content::FORMAT_ICON)?></div>
                    </div>
                    <div class="col-auto">
                        <div><?=$obj->getVitality(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getSagesse(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getStrong(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getIntel(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getAgi(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getChance(Content::FORMAT_ICON);?></div>
                    </div>
                    <div class="col-auto">
                        <div><?=$obj->getCa(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getFuite(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getTacle(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getDodge_pa(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getDodge_pm(Content::FORMAT_ICON);?></div>
                    </div> 
                    <div class="col-auto gap-1">
                        <div><?=$obj->getDo_fixe_neutre(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getDo_fixe_terre(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getDo_fixe_feu(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getDo_fixe_air(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getDo_fixe_eau(Content::FORMAT_ICON)?></div>
                        <div><?=$obj->getDo_fixe_multiple(Content::FORMAT_ICON)?></div>
                    </div>
                    <div class="col-auto">
                        <div><?=$obj->getRes_neutre(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getRes_terre(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getRes_feu(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getRes_air(Content::FORMAT_ICON);?></div>
                        <div><?=$obj->getRes_eau(Content::FORMAT_ICON);?></div>
                    </div>
                    <div class="col-auto">
                        <div class="truncate-100"><?=$obj->getDo_fixe_neutre(Content::FORMAT_ICON);?></div>
                        <div class="truncate-100"><?=$obj->getDo_fixe_terre(Content::FORMAT_ICON);?></div>
                        <div class="truncate-100"><?=$obj->getDo_fixe_feu(Content::FORMAT_ICON);?></div>
                        <div class="truncate-100"><?=$obj->getDo_fixe_air(Content::FORMAT_ICON);?></div>
                        <div class="truncate-100"><?=$obj->getDo_fixe_eau(Content::FORMAT_ICON);?></div>
                        <div class="truncate-100"><?=$obj->getDo_fixe_multiple(Content::FORMAT_ICON);?></div>
                    </div> 
                </div>
                <button class="p-0 px-2 pt-2 btn btn-text-grey d-flex align-items-baseline w-100 justify-content-between font-size-0-7" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_skill<?=$obj->getUniqid()?>" aria-expanded="true" aria-controls="collapse_skill<?=$obj->getUniqid()?>">
                    <span>Compétences</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div id="collapse_skill<?=$obj->getUniqid()?>" class="row px-1">
                    <div class="col-auto my-1">
                        <p class="m-1"><?=$obj->getAcrobatie(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getDiscretion(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getEscamotage(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getAthletisme(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getIntimidation(Content::FORMAT_ICON)?></p>
                    </div>
                    <div class="col-auto my-1">
                        <p class="m-1"><?=$obj->getArcane(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getHistoire(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getInvestigation(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getNature(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getReligion(Content::FORMAT_ICON)?></p>
                    </div>
                    <div class="col-auto my-1">
                        <p class="m-1"><?=$obj->getDressage(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getMedecine(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getPerception(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getPerspicacite(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getSurvie(Content::FORMAT_ICON)?></p>
                    </div>
                    <div class="col-auto my-1">
                        <p class="m-1"><?=$obj->getPersuasion(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getRepresentation(Content::FORMAT_ICON)?></p>
                        <p class="m-1"><?=$obj->getSupercherie(Content::FORMAT_ICON)?></p>
                    </div>
                </div>
                <?php $spells = $obj->getSpell(Content::DISPLAY_LIST); 
                    if(!empty($spells)){ ?>
                        <p class="text-main-d-2 text-bold mt-3 text-center">Sorts</p>
                        <div><?=$spells?></div>
                <?php } ?>
                <?php $aptitudes = $obj->getCapability(Content::DISPLAY_LIST); 
                if(!empty($aptitudes)){ ?>
                    <p class="text-main-d-2 text-bold mt-3 text-center">Aptitudes</p>
                    <div><?=$aptitudes?></div>
                <?php } ?>
                <p class="card-text text-grey-d-2"><?=$obj->getStory();?></p>
                <div class="nav-item-divider back-main-d-1"></div>
                <p class="card-text text-grey"><?=$obj->getOther_info();?></p>
                <div class="d-flex flex-row justify-content-between">
                    <?=$obj->getDrop_()?>
                    <?=$obj->getKamas()?>
                </div>
            </div>
        </div>
    </div>
</div>