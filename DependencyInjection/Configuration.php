<?php

/*
 * This file is part of the CCDNForum ForumBundle
 *include 'Configuration.php';

 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNForum\ForumBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class }
 *
 * @category CCDNForum
 * @package  ForumBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNForumForumBundle
 *
 */
class Configuration implements ConfigurationInterface
{
    /**
     *
     * @access public
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ccdn_forum_forum');

        $rootNode
            ->children()
                ->arrayNode('template')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('engine')->defaultValue('twig')->end()
                    ->end()
                ->end()
            ->end();

        // Class file namespaces.
        $this
            ->addEntitySection($rootNode)
            ->addGatewaySection($rootNode)
            ->addRepositorySection($rootNode)
            ->addManagerSection($rootNode)
            ->addModelSection($rootNode)
            ->addFormSection($rootNode)
            ->addComponentSection($rootNode)
        ;

        // Configuration stuff.
        $this
            ->addFixtureReferenceSection($rootNode)
            ->addSEOSection($rootNode)
            ->addCategorySection($rootNode)
            ->addBoardSection($rootNode)
            ->addTopicSection($rootNode)
            ->addPostSection($rootNode)
            ->addItemPostSection($rootNode)
            ->addSubscriptionSection($rootNode)
        ;

        return $treeBuilder;
    }

    /**
     *
     * @access private
     * @param  \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addEntitySection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('entity')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('forum')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Entity\Forum')->end()
                            ->end()
                        ->end()
                        ->arrayNode('category')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Entity\Category')->end()
                            ->end()
                        ->end()
                        ->arrayNode('board')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Entity\Board')->end()
                            ->end()
                        ->end()
                        ->arrayNode('topic')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Entity\Topic')->end()
                            ->end()
                        ->end()
                        ->arrayNode('post')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Entity\Post')->end()
                            ->end()
                        ->end()
                        ->arrayNode('subscription')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Entity\Subscription')->end()
                            ->end()
                        ->end()
                        ->arrayNode('registry')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Entity\Registry')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addGatewaySection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('gateway')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('forum')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Gateway\ForumGateway')->end()
                            ->end()
                        ->end()
                        ->arrayNode('category')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Gateway\CategoryGateway')->end()
                            ->end()
                        ->end()
                        ->arrayNode('board')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Gateway\BoardGateway')->end()
                            ->end()
                        ->end()
                        ->arrayNode('topic')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Gateway\TopicGateway')->end()
                            ->end()
                        ->end()
                        ->arrayNode('post')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Gateway\PostGateway')->end()
                            ->end()
                        ->end()
                        ->arrayNode('subscription')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Gateway\SubscriptionGateway')->end()
                            ->end()
                        ->end()
                        ->arrayNode('registry')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Gateway\RegistryGateway')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addRepositorySection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('repository')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('forum')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Repository\ForumRepository')->end()
                            ->end()
                        ->end()
                        ->arrayNode('category')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Repository\CategoryRepository')->end()
                            ->end()
                        ->end()
                        ->arrayNode('board')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Repository\BoardRepository')->end()
                            ->end()
                        ->end()
                        ->arrayNode('topic')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Repository\TopicRepository')->end()
                            ->end()
                        ->end()
                        ->arrayNode('post')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Repository\PostRepository')->end()
                            ->end()
                        ->end()
                        ->arrayNode('subscription')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Repository\SubscriptionRepository')->end()
                            ->end()
                        ->end()
                        ->arrayNode('registry')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Repository\RegistryRepository')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addManagerSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('manager')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('forum')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Manager\ForumManager')->end()
                            ->end()
                        ->end()
                        ->arrayNode('category')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Manager\CategoryManager')->end()
                            ->end()
                        ->end()
                        ->arrayNode('board')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Manager\BoardManager')->end()
                            ->end()
                        ->end()
                        ->arrayNode('topic')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Manager\TopicManager')->end()
                            ->end()
                        ->end()
                        ->arrayNode('post')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Manager\PostManager')->end()
                            ->end()
                        ->end()
                        ->arrayNode('subscription')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Manager\SubscriptionManager')->end()
                            ->end()
                        ->end()
                        ->arrayNode('registry')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Manager\RegistryManager')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addModelSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('model')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('bag')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Model\Bag\ModelBag')->end()
                            ->end()
                        ->end()
                        ->arrayNode('utility_bag')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Utility\Bag\UtilityBag')->end()
                            ->end()
                        ->end()
                        ->arrayNode('utility')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->arrayNode('pagination_config')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Utility\PaginationConfig')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('forum')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Model\ForumModel')->end()
                            ->end()
                        ->end()
                        ->arrayNode('category')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Model\CategoryModel')->end()
                            ->end()
                        ->end()
                        ->arrayNode('board')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Model\BoardModel')->end()
                            ->end()
                        ->end()
                        ->arrayNode('topic')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Model\TopicModel')->end()
                            ->end()
                        ->end()
                        ->arrayNode('post')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Model\PostModel')->end()
                            ->end()
                        ->end()
                        ->arrayNode('subscription')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Model\SubscriptionModel')->end()
                            ->end()
                        ->end()
                        ->arrayNode('registry')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Model\Model\RegistryModel')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addFormSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('form')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('type')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->arrayNode('forum_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Admin\Forum\ForumCreateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('forum_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Admin\Forum\ForumUpdateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('forum_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Admin\Forum\ForumDeleteFormType')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('category_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Admin\Category\CategoryCreateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('category_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Admin\Category\CategoryUpdateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('category_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Admin\Category\CategoryDeleteFormType')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('board_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Admin\Board\BoardCreateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('board_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Admin\Board\BoardUpdateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('board_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Admin\Board\BoardDeleteFormType')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('topic_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\User\Topic\TopicCreateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('topic_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\User\Topic\TopicUpdateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('topic_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Moderator\Topic\TopicDeleteFormType')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('change_topics_board')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Moderator\Topic\TopicChangeBoardFormType')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('post_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\User\Post\PostCreateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('post_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\User\Post\PostUpdateFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('post_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\User\Post\PostDeleteFormType')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('post_unlock')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Type\Moderator\Post\PostUnlockFormType')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('handler')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->arrayNode('forum_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Admin\Forum\ForumCreateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('forum_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Admin\Forum\ForumUpdateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('forum_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Admin\Forum\ForumDeleteFormHandler')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('category_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Admin\Category\CategoryCreateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('category_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Admin\Category\CategoryUpdateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('category_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Admin\Category\CategoryDeleteFormHandler')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('board_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Admin\Board\BoardCreateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('board_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Admin\Board\BoardUpdateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('board_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Admin\Board\BoardDeleteFormHandler')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('topic_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\User\Topic\TopicCreateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('topic_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\User\Topic\TopicUpdateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('topic_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Moderator\Topic\TopicDeleteFormHandler')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('change_topics_board')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Moderator\Topic\TopicChangeBoardFormHandler')->end()
                                    ->end()
                                ->end()

                                ->arrayNode('post_create')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\User\Post\PostCreateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('post_update')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\User\Post\PostUpdateFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('post_delete')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\User\Post\PostDeleteFormHandler')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('post_unlock')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Form\Handler\Moderator\Post\PostUnlockFormHandler')->end()
                                    ->end()
                                ->end()

                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addComponentSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('component')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('dashboard')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->arrayNode('integrator')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\Dashboard\DashboardIntegrator')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('crumb_factory')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\Crumbs\Factory\CrumbFactory')->end()
                            ->end()
                        ->end()
                        ->arrayNode('crumb_builder')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\Crumbs\CrumbBuilder')->end()
                            ->end()
                        ->end()

                        ->arrayNode('security')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->arrayNode('authorizer')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\Security\Authorizer')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('role_helper')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\Helper\RoleHelper')->end()
                            ->end()
                        ->end()
                        ->arrayNode('flood_control')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\FloodControl')->end()
                            ->end()
                        ->end()

                        ->arrayNode('twig_extension')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->arrayNode('board_list')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\TwigExtension\BoardListExtension')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('authorizer')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\TwigExtension\AuthorizerExtension')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()

                        ->arrayNode('event_listener')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->arrayNode('flash')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\Dispatcher\Listener\FlashListener')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('subscriber')
                                    ->addDefaultsIfNotSet()
                                    ->canBeUnset()
                                    ->children()
                                        ->scalarNode('class')->defaultValue('CCDNForum\ForumBundle\Component\Dispatcher\Listener\SubscriberListener')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()

                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access protected
     * @param  ArrayNodeDefinition                                      $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    protected function addFixtureReferenceSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('fixtures')
                    ->addDefaultsIfNotSet()
                    ->children()
                    ->scalarNode('user_admin')->defaultValue('user-admin')->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access protected
     * @param  ArrayNodeDefinition                                      $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    protected function addSEOSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('seo')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('title_length')->defaultValue('67')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  ArrayNodeDefinition                                      $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addCategorySection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('category')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('last_post_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                        ->arrayNode('index')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('show')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  ArrayNodeDefinition                                      $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addBoardSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('board')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('show')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('topics_per_page')->defaultValue('50')->end()
                                ->scalarNode('topic_title_truncate')->defaultValue('50')->end()
                                ->scalarNode('first_post_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                                ->scalarNode('last_post_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  ArrayNodeDefinition                                      $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addTopicSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('topic')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('flood_control')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('post_limit')->defaultValue(4)->end()
                                ->scalarNode('block_for_minutes')->defaultValue(1)->end()
                            ->end()
                        ->end()
                        ->arrayNode('show')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('posts_per_page')->defaultValue('20')->end()
                                ->scalarNode('closed_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                                ->scalarNode('deleted_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                            ->end()
                        ->end()
                        ->arrayNode('create')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNForumForumBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('reply')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNForumForumBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('change_board')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNForumForumBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  ArrayNodeDefinition                                      $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addPostSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('post')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('show')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
//                                ->scalarNode('closed_datetime_format')->defaultValue('d-m-Y - H:i')->end()
//                                ->scalarNode('deleted_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                            ->end()
                        ->end()
                        ->arrayNode('edit_topic')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNForumForumBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('edit_post')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNForumForumBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('delete_post')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  ArrayNodeDefinition                                      $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addItemPostSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('item_post')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('created_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                        ->scalarNode('edited_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                        ->scalarNode('locked_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                        ->scalarNode('deleted_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }

    /**
     *
     * @access private
     * @param  ArrayNodeDefinition                                      $node
     * @return \CCDNForum\ForumBundle\DependencyInjection\Configuration
     */
    private function addSubscriptionSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('subscription')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('list')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('topics_per_page')->defaultValue('50')->end()
                                ->scalarNode('topic_title_truncate')->defaultValue('50')->end()
                                ->scalarNode('first_post_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                                ->scalarNode('last_post_datetime_format')->defaultValue('d-m-Y - H:i')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $this;
    }
}
