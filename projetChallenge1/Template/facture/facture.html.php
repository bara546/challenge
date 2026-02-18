
        <div class="mb-6">
            <div class="bg-gray-800 rounded-lg p-6">
                <h1 class="text-2xl text-white font-bold mb-6">Commande #12345</h1>
                
                <!-- Client and Vendor Information -->
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <!-- Client Section -->
                    <div class="bg-gray-700 rounded-lg p-4">
                        <h2 class="text-lg font-semibold text-green-accent mb-3">Client</h2>
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="font-medium text-gray-300">Nom:</span> 
                                <span class="text-white ml-2">DIASSY</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-300">Prénom:</span> 
                                <span class="text-white ml-2">BAKARY</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-300">Téléphone:</span> 
                                <span class="text-white ml-2">771716387</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vendor Section -->
                    <div class="bg-gray-700 rounded-lg p-4">
                        <h2 class="text-lg font-semibold text-green-accent mb-3">Vendeur</h2>
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="font-medium text-gray-300">Nom:</span> 
                                <span class="text-white ml-2">DIOP</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-300">Prénom:</span> 
                                <span class="text-white ml-2">MOUHAMADOU</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-300">Matricule:</span> 
                                <span class="text-white ml-2">MAT001</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Information -->
                <div class="bg-gray-700 rounded-lg p-4">
                    <h2 class="text-lg font-semibold text-green-accent mb-3">Informations de la commande</h2>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-medium text-gray-300">Date:</span> 
                            <span class="text-white ml-2">02/20/2020</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-300">Total:</span> 
                            <span class="text-white ml-2">1370.00fcfa</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-300">Montant payé:</span> 
                            <span class="text-white ml-2">1370.00fcfa</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-300">Statut:</span> 
                            <span class="text-green-accent ml-2">Impayé</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-4">Résumé de la Commande</h2>
            <div class="bg-dark-bg rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-700">
                            <th class="text-left px-6 py-4 font-medium">Produit</th>
                            <th class="text-left px-6 py-4 font-medium">Quantité</th>
                            <th class="text-left px-6 py-4 font-medium">Prix</th>
                            <th class="text-left px-6 py-4 font-medium">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-700 hover:bg-gray-800 transition-colors">
                            <td class="px-6 py-4">Riz</td>
                            <td class="px-6 py-4">100</td>
                            <td class="px-6 py-4">10000</td>
                            <td class="px-6 py-4">1.000.000fcfa</td>
                        </tr>
                        <tr class="border-b border-gray-700 hover:bg-gray-800 transition-colors">
                            <td class="px-6 py-4">Lait</td>
                            <td class="px-6 py-4">50</td>
                            <td class="px-6 py-4">2000</td>
                            <td class="px-6 py-4">100000fcfa</td>
                        </tr>
                        <tr class="hover:bg-gray-800 transition-colors">
                            <td class="px-6 py-4">sucre</td>
                            <td class="px-6 py-4">200</td>
                            <td class="px-6 py-4">500</td>
                            <td class="px-6 py-4">500000fcfa</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mb-8">
            <div class="flex items-center space-x-2">
                <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="w-8 h-8 flex items-center justify-center bg-green-accent text-black rounded font-medium">1</button>
                <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-white transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-white transition-colors">3</button>
                <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Actions Section -->
        <div class="">
            <!-- Invoice Section -->
            <div class="flex justify-between ">
                <h3 class="text-lg font-semibold"></h3>
                <button class="bg-green-accent hover:bg-green-hover text-black font-medium px-6 py-3 rounded-lg transition-colors">
                    Télécharger facture
                </button>
            </div>

            <!-- Payment Section -->
            <div>
                <h3 class="text-lg font-semibold mb-4 mt-4" >Paiement</h3>
                <div class="bg-dark-bg rounded-lg p-6">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-2 font-medium text-sm">Date</th>
                                <th class="text-left py-2 font-medium text-sm">Montant Total</th>
                                <th class="text-left py-2 font-medium text-sm">Méthode</th>
                                <th class="text-left py-2 font-medium text-sm">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-3 text-sm">2025-12-22</td>
                                <td class="py-3 text-sm">200000fcfa</td>
                                <td class="py-3 text-sm">Carte Credit</td>
                                <td class="py-3 text-sm">
                                    <span class="bg-green-accent text-black px-2 py-1 rounded text-xs font-medium">Payé</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <button class="bg-green-accent hover:bg-green-hover text-black font-medium px-6 py-3 rounded-lg transition-colors">
                        Enregistrer un paiement
                    </button>
                </div>
            </div>
        </div>
   