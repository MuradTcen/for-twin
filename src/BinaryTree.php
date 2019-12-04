<?php


namespace Test;


class BinaryTree
{
    protected $root = NULL;

    /**
     * @var int
     */
    private $realCapacity = 0;

    /**
     * @var int
     */
    private $expectedCapacity = 0;

    /**
     * @var array
     */
    private $arrayValues = [];

    /**
     * @param int $expectedCapacity
     */
    public function setExpectedCapacity(int $expectedCapacity): void
    {
        $this->expectedCapacity = $expectedCapacity;
    }

    /**
     * @return int
     */
    public function getRealCapacity(): int
    {
        return $this->realCapacity;
    }

    /**
     * @param $value
     */
    public function insert($value)
    {
        $node = new BinaryNode($value);

        $this->insertNode($node, $this->root);

        $this->realCapacity++;

        if ($this->realCapacity > $this->expectedCapacity) {
            $this->deleteSmallestNode();
        }
    }

    /**
     *
     */
    protected function deleteSmallestNode()
    {
        $node = &$this->getSmallestNode($this->root);

        $this->deleteNode($node);

        $this->realCapacity--;
    }

    /**
     * @param $tree
     * @return mixed
     */
    protected function &getSmallestNode(&$tree): ?BinaryNode
    {
        if (is_null($tree->left)) return $tree;

        if ($tree->left) return $this->getSmallestNode($tree->left);
    }

    protected function deleteNode(BinaryNode &$node)
    {
        // Если у узла нет потомков, удаляем его
        if (is_null($node->left) && is_null($node->right)) {
            $node = NULL;
        } // Если у узла нет левого поддерева, заменяем его правым поддеревом
        elseif (is_null($node->left)) {
            $node = $node->right;
        } // Если у узла нет правого поддерева, заменяем его левым поддеревом
        elseif (is_null($node->right)) {
            $node = $node->left;

        } // Если у узла есть оба потомка
        else {
            // Если у правого поддерева нет левого потомка, то заменяем удаляемый узел правым потомком, сохраняя левую ветвь удаляемого узла
            if (is_null($node->right->left)) {
                $node->right->left = $node->left;
                $node = $node->right;
            } // если у правого поддерева есть левый потомок, то копируем его значение в удаляемый узел и рекурсивно удаляем
            else {
                $node->value = $node->right->left->value;
                $this->deleteNode($node->right->left);
            }
        }
    }

    protected function insertNode(BinaryNode $node, &$subtree)
    {
        if (is_null($subtree)) {
            $subtree = $node;
        } else {
            if ($node->value < $subtree->value) {
                $this->insertNode($node, $subtree->left);
            } elseif ($node->value > $subtree->value) {
                $this->insertNode($node, $subtree->right);
            }
        }
        return $this;
    }

    /**
     * @return array|null
     */
    public function getArrayValues(): ?array
    {
        $this->addSubtreeValueToArray($this->root);

        return $this->arrayValues;
    }

    /**
     * @param $subtree
     * @return void|null
     */
    protected function addSubtreeValueToArray($subtree)
    {
        if (is_null($subtree)) {
        } else {
            $this->addSubtreeValueToArray($subtree->left);

            $this->arrayValues [] = $subtree->value;

            $this->addSubtreeValueToArray($subtree->right);
        }
    }
}