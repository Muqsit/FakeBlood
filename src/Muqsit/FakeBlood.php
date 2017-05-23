<?php
namespace Muqsit;

use pocketmine\plugin\PluginBase;

use pocketmine\event\{
	entity\{
		EntityDamageEvent, EntityDamageByEntityEvent
	},
	Listener
};
use pocketmine\Player;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\block\Block;

class FakeBlood extends PluginBase implements Listener{

	const CHANCE = 5;
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function inPvP(EntityDamageEvent $e){
		if($e->instanceof EntityDamageByEntityEvent){
			if(!$e->isCancelled() and (mt_rand(1, self::CHANCE) === 1)){
				if($e->getEntity() instanceof Player and $e->getDamager() instanceof Player){
					$e->getEntity()->getLevel()->addParticle(new DestroyBlockParticle($e->getEntity(), Block::get(152)));
				}
			}
		}
	}
}
