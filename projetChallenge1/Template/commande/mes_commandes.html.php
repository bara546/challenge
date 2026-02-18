
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes commandes | Espace Client</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a1a;
            color: #ffffff;
        }
        /* Styles additionnels pour le thème dark */
        .bg-dark-card {
            background-color: #2a2a2a;
        }
        .border-dark {
            border-color: #3a3a3a;
        }
        .hover-dark:hover {
            background-color: #3a3a3a;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-white">Mes commandes</h1>
        <a href="/logout" class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-lg transition-colors flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Déconnexion
        </a>
    </div>

    <?php if (isset($error)): ?>
        <div class="bg-red-900/30 border-l-4 border-red-500 p-4 mb-6 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-400"><?= htmlspecialchars($error) ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (empty($commandes) && !isset($error)): ?>
        <div class="bg-gray-800 border-l-4 border-green-500 p-4 mb-6 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586l-1.707-1.707a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-gray-300">Vous n'avez pas encore passé de commande.</p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-700 text-gray-300 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">N° Commande</th>
                        <th class="py-3 px-6 text-left">Date</th>
                        <th class="py-3 px-6 text-left">Vendeur</th>
                        <th class="py-3 px-6 text-right">Statut</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 text-sm">
                    <?php foreach ($commandes as $commande): ?>
                        <tr class="border-b border-gray-700 hover:bg-gray-750 transition-colors">
                            <td class="py-4 px-6 text-left text-white">#COM_<?= str_pad($commande->getId(), 3, '0', STR_PAD_LEFT) ?></td>
                            <td class="py-4 px-6 text-left"><?= date('d/m/Y', strtotime($commande->getDate())) ?></td>
                            <td class="py-4 px-6 text-left">
                                <?php if ($commande->getVendeur()): ?>
                                    <div class="text-white">
                                        <div class="font-medium"><?= htmlspecialchars($commande->getVendeur()->getNom() . ' ' . $commande->getVendeur()->getPrenom()) ?></div>
                                        <?php if (method_exists($commande->getVendeur(), 'getMatricule')): ?>
                                            <div class="text-xs text-gray-400">Mat: <?= htmlspecialchars($commande->getVendeur()->getMatricule()) ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <span class="text-gray-400">Vendeur non assigné</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6 text-right">
                                    <span class="bg-green-600/30 text-green-400 px-3 py-1 rounded-full text-xs font-semibold">
                                        <?= htmlspecialchars($commande->getFacture()->getStatut()->value) ?>
                                    </span>
                                  
                            </td>
                            <td class="py-4 px-6 text-center">
                                <a href="/facture/<?= $commande->getId() ?>" class="bg-green-600 hover:bg-green-700 text-white font-medium py-1 px-4 rounded-lg text-xs transition-colors inline-flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                    </svg>
                                    Voir facture
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>



    <!-- Badge espace client -->
    <div class="fixed bottom-4 right-4">
        <div class="bg-green-600 text-white px-4 py-2 rounded-full shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 005 10a6 6 0 0012 0c0-.351-.033-.696-.092-1.028A5.001 5.001 0 0010 11z" clip-rule="evenodd"></path>
            </svg>
            Espace Client
        </div>
    </div>
</div>

</body>
</html>