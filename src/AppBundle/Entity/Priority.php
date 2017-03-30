<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Task;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Priority
 *
 * @ORM\Table(name="priority")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PriorityRepository")
 */
class Priority
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;


    /**
       *@var ArrayCollection
       *
       *@ORM\OneToMany(targetEntity="Task", mappedBy="priority")
       */
       private $tasks;
       public function __construct(){
              $this->tasks = new ArrayCollection();
       }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Priority
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Priority
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

     /**
     *Add task
     *
     *@param Task $Task
     *
     *@return Priority
     */
     public function addTask(Task $task)
     {
            $this->tasks[] = $task;
            return $this;
     }

     /**
     * Remove task
     *
     * @param Task $task
     *
     *@return Priority
     */
     public function removeTask(Task $task)
     {
            $this->tasks->removeElement($task);
            return $this;
     }

     /**
     *Get tasks
     *
     *@return ArrayCollection
     */
     public function getTasks()
     {
            return $this->$tasks;
     }

     /**
     *set tasks
     *
     *@param ArrayCollection $tasks
     *
     *@return Priority
     */
     public function setTasks(ArrayCollection $tasks){
            $this->tasks = $tasks;
     }
}
