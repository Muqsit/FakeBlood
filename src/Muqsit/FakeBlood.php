<?php
namespace Muqsit;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\{EntityDamageEvent, EntityDamageByEntityEvent};
use pocketmine\player;
use pocketmine\level\particle\RedstoneParticle;

class FakeBlood extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function inPvP(EntityDamageEvent $e){
    if($e->isCancelled()) return;
    if($e->instanceof EntityDamageByEntityEvent){
      if($e->getEntity() instanceof Player && $e->getDamager() instanceof Player){
        switch(mt_rand(1, 5){
          case 5:
            $e->getEntity()->getLevel()->addParticle(new RedstoneParticle(new Vector3($e->getEntity()->x, $e->getEntity()->y, $e->getEntity()->z));
          break;
        }
      }
    }
  }
}
