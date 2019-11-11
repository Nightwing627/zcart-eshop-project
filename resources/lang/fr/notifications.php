<?php 
return array (
  'password_updated' => 
  array (
    'subject' => 'Votre mot de passe :marketplace a été mis à jour avec succès!',
    'greeting' => 'Bonjour :user!',
    'message' => 'Le mot de passe de connexion à votre compte a été modifié avec succès! Si vous n\'avez pas effectué ce changement, veuillez nous contacter dès que possible! Cliquez sur le bouton ci-dessous pour vous connecter à votre page de profil.',
    'button_text' => 'Visitez votre profil',
  ),
  'invoice_created' => 
  array (
    'subject' => ':marketplace Facture d\'abonnement mensuel',
    'greeting' => 'Bonjour :merchant!',
    'message' => 'Merci pour votre soutien continu. Nous avons joint une copie de votre facture pour vos dossiers. S\'il vous plaît laissez-nous savoir si vous avez des questions ou des préoccupations!',
    'action' => 
    array (
      'text' => 'Aller au tableau de bord',
      'color' => 'vert',
    ),
  ),
  'customer_registered' => 
  array (
    'subject' => 'Bienvenue sur le marché :marketplace!',
    'greeting' => 'Félicitation :customer!',
    'message' => 'Votre compte a été créé avec succès! Cliquez sur le bouton ci-dessous pour vérifier votre adresse e-mail.',
    'action' => 
    array (
      'text' => 'Vérifie moi',
      'color' => 'vert',
    ),
  ),
  'customer_updated' => 
  array (
    'subject' => 'Les informations de compte ont été mises à jour avec succès!',
    'greeting' => 'Bonjour :customer!',
    'message' => 'Ceci est une notification pour vous informer que votre compte a été mis à jour avec succès!',
    'action' => 
    array (
      'text' => 'Visitez votre profil',
      'color' => 'bleu',
    ),
  ),
  'customer_password_reset' => 
  array (
    'subject' => 'Réinitialiser la notification du mot de passe',
    'greeting' => 'salut!',
    'message' => 'Vous recevez cet email car nous avons reçu une demande de réinitialisation du mot de passe pour votre compte. Si vous n\'avez pas demandé de réinitialisation de mot de passe, ignorez simplement cette notification et aucune autre action n\'est requise.',
    'button_text' => 'réinitialiser le mot de passe',
  ),
  'dispute_acknowledgement' => 
  array (
    'subject' => '[ID de commande: :order_id] Le litige a été soumis avec succès',
    'greeting' => 'Bonjour :customer',
    'message' => 'Ceci est une notification pour vous informer que nous avons reçu votre contestation concernant l\'ID de commande: :order_id, notre équipe d\'assistance vous contactera dans les plus brefs délais.',
    'action' => 
    array (
      'text' => 'Voir le litige',
      'color' => 'bleu',
    ),
  ),
  'dispute_created' => 
  array (
    'subject' => 'Nouveau litige pour l\'ID de commande: :order_id',
    'greeting' => 'Bonjour :merchant!',
    'message' => 'Vous avez reçu un nouveau litige concernant l\'ID de commande: :order_id. Veuillez examiner et résoudre le problème avec le client.',
    'action' => 
    array (
      'text' => 'Voir le litige',
      'color' => 'vert',
    ),
  ),
  'dispute_updated' => 
  array (
    'subject' => '[ID de commande: :order_id] Le statut du litige a été mis à jour!',
    'greeting' => 'Bonjour :customer!',
    'message' => 'Un différend concernant l\'ID de commande :order_id a été mis à jour avec ce message du fournisseur ": reply". Veuillez vérifier ci-dessous et contactez-nous si vous avez besoin d\'aide.',
    'action' => 
    array (
      'text' => 'Voir le litige',
      'color' => 'bleu',
    ),
  ),
  'dispute_appealed' => 
  array (
    'subject' => '[ID de commande: :order_id] Litige en appel!',
    'greeting' => 'salut!',
    'message' => 'Un litige concernant l\'ID de commande :order_id a été interjeté en appel avec le message ": réponse". S\'il vous plaît vérifier ci-dessous pour plus de détails.',
    'action' => 
    array (
      'text' => 'Voir le litige',
      'color' => 'bleu',
    ),
  ),
  'appealed_dispute_replied' => 
  array (
    'subject' => '[ID de commande: :order_id] Nouvelle réponse pour un litige en appel!',
    'greeting' => 'salut!',
    'message' => 'Un différend concernant l\'ID de commande :order_id a été répondu avec le message suivant: </br> </br> ": réponse"',
    'action' => 
    array (
      'text' => 'Voir le litige',
      'color' => 'bleu',
    ),
  ),
  'low_inventory_notification' => 
  array (
    'subject' => 'Alerte d\'inventaire faible!',
    'greeting' => 'salut!',
    'message' => 'Un ou plusieurs de vos objets d\'inventaire deviennent faibles. Il est temps d\'ajouter plus d\'inventaire pour maintenir l\'élément en vie sur le marché.',
    'action' => 
    array (
      'text' => 'Mise à jour de l\'inventaire',
      'color' => 'bleu',
    ),
  ),
  'new_message' => 
  array (
    'subject' => ':subject',
    'greeting' => 'Bonjour :receiver',
    'message' => ':message',
    'action' => 
    array (
      'text' => 'Voir le message sur le site',
      'color' => 'bleu',
    ),
  ),
  'message_replied' => 
  array (
    'subject' => ':user a répondu :subject',
    'greeting' => 'Bonjour :receiver',
    'message' => ':reply',
    'action' => 
    array (
      'text' => 'Voir le message sur le site',
      'color' => 'bleu',
    ),
  ),
  'order_created' => 
  array (
    'subject' => '[ID de commande: :order] votre commande a été passée avec succès!',
    'greeting' => 'Bonjour :customer',
    'message' => 'Merci de nous avoir choisi! Votre commande [Order ID :order] a été passée avec succès. Nous vous ferons savoir le statut de la commande.',
    'action' => 
    array (
      'text' => 'Visitez la boutique',
      'color' => 'bleu',
    ),
  ),
  'merchant_order_created_notification' => 
  array (
    'subject' => 'Nouvelle commande [ID de commande: :order] a été placé sur votre boutique!',
    'greeting' => 'Bonjour :merchant',
    'message' => 'Une nouvelle commande [Order ID :order] a été passée. S\'il vous plaît vérifier les détails de la commande et remplir la commande dès que possible.',
    'action' => 
    array (
      'text' => 'Remplir la commande',
      'color' => 'bleu',
    ),
  ),
  'order_updated' => 
  array (
    'subject' => '[ID de commande: :order] le statut de votre commande a été mis à jour!',
    'greeting' => 'Bonjour :customer',
    'message' => 'Ceci est une notification pour vous faire savoir que votre commande [Order ID :order] a été mise à jour. Veuillez voir ci-dessous pour les détails de la commande. Vous pouvez également vérifier vos commandes à partir de votre tableau de bord.',
    'action' => 
    array (
      'text' => 'Visitez la boutique',
      'color' => 'bleu',
    ),
  ),
  'order_fulfilled' => 
  array (
    'subject' => '[ID de commande: :order] Votre commande arrive!',
    'greeting' => 'Bonjour :customer',
    'message' => 'Ceci est une notification pour vous informer que votre commande [Order ID :order] a été expédiée et qu\'elle est en route. Veuillez voir ci-dessous pour les détails de la commande. Vous pouvez également vérifier vos commandes à partir de votre tableau de bord.',
    'action' => 
    array (
      'text' => 'Visitez la boutique',
      'color' => 'vert',
    ),
  ),
  'order_paid' => 
  array (
    'subject' => '[ID de commande: :order] Votre commande a été payée avec succès!',
    'greeting' => 'Bonjour :customer',
    'message' => 'Ceci est une notification pour vous informer que votre commande [Order ID :order] a été payée avec succès et qu\'elle est en route. Veuillez voir ci-dessous pour les détails de la commande. Vous pouvez également vérifier vos commandes à partir de votre tableau de bord.',
    'action' => 
    array (
      'text' => 'Visitez la boutique',
      'color' => 'vert',
    ),
  ),
  'order_payment_failed' => 
  array (
    'subject' => '[ID de commande: le paiement :order] a échoué!',
    'greeting' => 'Bonjour :customer',
    'message' => 'Ceci est une notification pour vous faire savoir que votre commande a échoué. Veuillez voir ci-dessous pour les détails de la commande. Vous pouvez également vérifier vos commandes à partir de votre tableau de bord.',
    'action' => 
    array (
      'text' => 'Visitez la boutique',
      'color' => 'rouge',
    ),
  ),
  'refund_initiated' => 
  array (
    'subject' => '[ID de commande: :order] un remboursement a été initié!',
    'greeting' => 'Bonjour :customer',
    'message' => 'Ceci est une notification pour vous informer que nous avons lancé une demande de remboursement pour votre commande :order. Un membre de notre équipe examinera bientôt la demande. Nous vous informerons du statut de la demande.',
  ),
  'refund_approved' => 
  array (
    'subject' => '[ID de commande: :order] une demande de remboursement a été approuvée!',
    'greeting' => 'Bonjour :customer',
    'message' => 'Ceci est une notification pour vous informer que nous avons approuvé une demande de remboursement pour votre commande :order. Le montant remboursé est :amount. Nous avons envoyé l\'argent à votre mode de paiement, cela peut prendre quelques jours pour effectuer votre compte. Contactez votre fournisseur de paiement si vous ne voyez pas l\'argent effectué dans quelques jours.',
  ),
  'refund_declined' => 
  array (
    'subject' => '[ID de commande: :order] une demande de remboursement a été refusée!',
    'greeting' => 'Bonjour :customer',
    'message' => 'Ceci est une notification pour vous informer qu\'une demande de remboursement a été refusée pour votre commande :order. Si vous n\'êtes pas satisfait de la solution du commerçant, vous pouvez contacter le commerçant directement depuis la plate-forme ou même faire appel du différend sur :marketplace. Nous allons intervenir pour résoudre le problème.',
  ),
  'shop_created' => 
  array (
    'subject' => 'Votre magasin est prêt à partir!',
    'greeting' => 'Félicitation :merchant!',
    'message' => 'Votre boutique :shop_name a été créée avec succès! Cliquez sur le bouton ci-dessous pour vous connecter au panneau d\'administration de la boutique.',
    'action' => 
    array (
      'text' => 'Aller au tableau de bord',
      'color' => 'vert',
    ),
  ),
  'shop_updated' => 
  array (
    'subject' => 'Informations sur la boutique mises à jour avec succès!',
    'greeting' => 'Bonjour :merchant!',
    'message' => 'Ceci est une notification pour vous informer que votre boutique :shop_name a été mise à jour avec succès!',
    'action' => 
    array (
      'text' => 'Aller au tableau de bord',
      'color' => 'bleu',
    ),
  ),
  'shop_config_updated' => 
  array (
    'subject' => 'La configuration de la boutique a été mise à jour avec succès!',
    'greeting' => 'Bonjour :merchant!',
    'message' => 'La configuration de votre boutique a été mise à jour avec succès! Cliquez sur le bouton ci-dessous pour vous connecter au panneau d\'administration de la boutique.',
    'action' => 
    array (
      'text' => 'Aller au tableau de bord',
      'color' => 'bleu',
    ),
  ),
  'shop_down_for_maintainace' => 
  array (
    'subject' => 'Votre magasin est en panne!',
    'greeting' => 'Bonjour :merchant!',
    'message' => 'Ceci est une notification pour vous informer que votre boutique :shop_name est en panne! Aucun client ne peut visiter votre magasin avant qu\'il ne revienne à la vie.',
    'action' => 
    array (
      'text' => 'Aller à la page de configuration',
      'color' => 'bleu',
    ),
  ),
  'shop_is_live' => 
  array (
    'subject' => 'Votre boutique est de retour à vivre!',
    'greeting' => 'Bonjour :merchant',
    'message' => 'Ceci est une notification pour vous informer que votre boutique :shop_name est de retour pour vivre avec succès!',
    'action' => 
    array (
      'text' => 'Aller au tableau de bord',
      'color' => 'vert',
    ),
  ),
  'shop_deleted' => 
  array (
    'subject' => 'Votre boutique a été retirée de :marketplace!',
    'greeting' => 'Bonjour marchand!',
    'message' => 'Ceci est une notification pour vous informer que votre boutique a été supprimée de notre marqueur! Vous nous manquerez.',
  ),
  'system_is_down' => 
  array (
    'subject' => 'Votre marketplace :marketplace est en panne maintenant!',
    'greeting' => 'Bonjour :user!',
    'message' => 'Ceci est une notification pour vous informer que votre marketplace :marketplace est en panne! Aucun client ne peut visiter votre marché jusqu\'à ce qu\'il soit revenu à la vie.',
    'action' => 
    array (
      'text' => 'Aller à la page de configuration',
      'color' => 'bleu',
    ),
  ),
  'system_is_live' => 
  array (
    'subject' => 'Votre marketplace :marketplace est de retour sur LIVE!',
    'greeting' => 'Bonjour :user!',
    'message' => 'Ceci est une notification pour vous informer que votre marketplace :marketplace est de retour pour vivre avec succès!',
    'action' => 
    array (
      'text' => 'Aller au tableau de bord',
      'color' => 'vert',
    ),
  ),
  'system_info_updated' => 
  array (
    'subject' => ':marketplace - informations du marché mises à jour avec succès!',
    'greeting' => 'Bonjour :user!',
    'message' => 'Ceci est une notification pour vous informer que votre marketplace :marketplace a été mise à jour avec succès!',
    'action' => 
    array (
      'text' => 'Aller au tableau de bord',
      'color' => 'bleu',
    ),
  ),
  'system_config_updated' => 
  array (
    'subject' => ':marketplace - configuration du marché mise à jour avec succès!',
    'greeting' => 'Bonjour :user!',
    'message' => 'La configuration de votre marketplace :marketplace a été mise à jour avec succès! Cliquez sur le bouton ci-dessous pour vous connecter au panneau d\'administration.',
    'action' => 
    array (
      'text' => 'Paramètres d\'affichage',
      'color' => 'bleu',
    ),
  ),
  'new_contact_us_message' => 
  array (
    'subject' => 'Nouveau message via le formulaire de contact: :subject',
    'greeting' => 'salut!',
    'message_footer_with_phone' => 'Vous pouvez répondre à cet email ou contacter directement ce téléphone :phone',
    'message_footer' => 'Vous pouvez répondre directement à cet email.',
  ),
  'ticket_acknowledgement' => 
  array (
    'subject' => '[Ticket ID: :ticket_id] :subject',
    'greeting' => 'Bonjour :user',
    'message' => 'Ceci est une notification pour vous informer que nous avons bien reçu votre ticket :ticket_id! Notre équipe d\'assistance vous contactera dans les meilleurs délais.',
    'action' => 
    array (
      'text' => 'Voir le billet',
      'color' => 'bleu',
    ),
  ),
  'ticket_created' => 
  array (
    'subject' => 'Nouveau ticket d\'assistance [ID du ticket: :ticket_id] :subject',
    'greeting' => 'salut!',
    'message' => 'Vous avez reçu un nouvel ID de ticket d\'assistance :ticket_id, Sender :sender du fournisseur :vendor. Examiner et assing le ticket pour soutenir l\'équipe.',
    'action' => 
    array (
      'text' => 'Voir le billet',
      'color' => 'vert',
    ),
  ),
  'ticket_assigned' => 
  array (
    'subject' => 'Un ticket vient de vous être attribué [Ticket IF: :ticket_id] :subject',
    'greeting' => 'Bonjour :user',
    'message' => 'Ceci est une notification pour vous informer que le ticket [ID du ticket: :ticket_id] :subject vient de vous être envoyé. Vérifiez et répondez au ticket le plus rapidement possible.',
    'action' => 
    array (
      'text' => 'Répondre au billet',
      'color' => 'bleu',
    ),
  ),
  'ticket_replied' => 
  array (
    'subject' => ':user a répondu au ticket [Ticket ID: :ticket_id] :subject',
    'greeting' => 'Bonjour :user',
    'message' => ':reply',
    'action' => 
    array (
      'text' => 'Voir le billet',
      'color' => 'bleu',
    ),
  ),
  'ticket_updated' => 
  array (
    'subject' => 'Un ticket [Ticket ID: :ticket_id] :subject a été mis à jour!',
    'greeting' => 'Bonjour :user!',
    'message' => 'Un de vos tickets d\'assistance N ° de ticket: ticket_id :subject a été mis à jour. S\'il vous plaît contactez-nous si vous avez besoin d\'aide.',
    'action' => 
    array (
      'text' => 'Voir le billet',
      'color' => 'bleu',
    ),
  ),
  'user_created' => 
  array (
    'subject' => ':admin vous a ajouté au marché :marketplace!',
    'greeting' => 'Félicitation :user!',
    'message' => 'Vous avez été ajouté au :marketplace par :admin! Cliquez sur le bouton ci-dessous pour vous connecter à votre compte. Utilisez le mot de passe temporaire pour la première connexion.',
    'alert' => 'N\'oubliez pas de changer votre mot de passe après la connexion.',
    'action' => 
    array (
      'text' => 'Visitez votre profil',
      'color' => 'vert',
    ),
  ),
  'user_updated' => 
  array (
    'subject' => 'Les informations de compte ont été mises à jour avec succès!',
    'greeting' => 'Bonjour :user!',
    'message' => 'Ceci est une notification pour vous informer que votre compte a été mis à jour avec succès!',
    'action' => 
    array (
      'text' => 'Visitez votre profil',
      'color' => 'bleu',
    ),
  ),
  'verdor_registered' => 
  array (
    'subject' => 'Nouveau vendeur vient de s\'inscrire!',
    'greeting' => 'Félicitation!',
    'message' => 'Votre marché :marketplace vient de recevoir un nouveau verdor avec le nom de magasin <strong>: nom_shop </ strong> et l\'adresse e-mail du commerçant est :merchant_email.',
    'action' => 
    array (
      'text' => 'Aller au tableau de bord',
      'color' => 'vert',
    ),
  ),
  'email_verification' => 
  array (
    'subject' => 'Vérifiez votre compte :marketplace!',
    'greeting' => 'Félicitation :user!',
    'message' => 'Votre compte a été créé avec succès! Cliquez sur le bouton ci-dessous pour vérifier votre adresse e-mail.',
    'button_text' => 'Vérifier mon email',
  ),
  'dispute_solved' => 
  array (
    'subject' => 'Litige [ID de commande: :order_id] a été marqué comme résolu!',
    'greeting' => 'Bonjour :customer!',
    'message' => 'Le litige relatif à l\'ID de commande: :order_id a été marqué comme résolu. Merci d\'être avec nous.',
    'action' => 
    array (
      'text' => 'Voir le litige',
      'color' => 'vert',
    ),
  ),
);