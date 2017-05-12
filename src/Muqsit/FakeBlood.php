<?php
namespace Muqsit;

use pocketmine\event\entity\{EntityDamageEvent, EntityDamageByEntityEvent};
use pocketmine\event\Listener;
use pocketmine\level\particle\RedstoneParticle;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class FakeBlood extends PluginBase implements Listener{

	const CHANCE = 5;
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function inPvP(EntityDamageEvent $e){
		if($e->instanceof EntityDamageByEntityEvent){
			if(!$e->isCancelled() and (mt_rand(1, self::CHANCE) === 1)){
				if($e->getEntity() instanceof Player and $e->getDamager() instanceof Player){
					$e->getEntity()->getLevel()->addParticle(new RedstoneParticle($e->getEntity()));
				}
			}
		}
	}
}
