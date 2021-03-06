<?php

/**
 * AuthorizenetBundle for Symfony2
 *
 * This Bundle is part of Symfony2 Payment Suite
 *
 * @author Denys Pasishnyi <dpcat237@gmail.com>
 *
 * Denys Pasishnyi 2013
 */

namespace PaymentSuite\AuthorizenetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use PaymentSuite\PaymentCoreBundle\Services\interfaces\PaymentBridgeInterface;

/**
 * Type for a shop edit profile form
 */
class AuthorizenetType extends AbstractType
{
    /**
     * @var PaymentBridgeInterface
     *
     * Payment bridge
     */
    private $paymentBridge;

    /**
     * Form type construct method
     *
     * @param PaymentBridgeInterface $paymentBridge Payment bridge
     */
    public function __construct(PaymentBridgeInterface $paymentBridge)
    {
        $this->paymentBridge = $paymentBridge;
    }

    /**
     * Build form function
     *
     * @param FormBuilderInterface $builder the formBuilder
     * @param array                $options the options for this form
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('credit_cart', 'text', array(
                'required' => true,
                'max_length' => 20,
            ))
            ->add('credit_cart_expiration_month', 'choice', array(
                'required' => true,
                'choices' => array_combine(range(1, 12), range(1, 12)),
            ))
            ->add('credit_cart_expiration_year', 'choice', array(
                'required' => true,
                'choices' => array_combine(range(13, 25), range(13, 25)),
            ));
    }

    /**
     * Return unique name for this form
     *
     * @return string
     */
    public function getName()
    {
        return 'authorizenet_view';
    }
}
