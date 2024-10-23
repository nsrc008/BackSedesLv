<?php

namespace App\Http\Controllers;

class LocationController extends Controller
{
    /**
     * Display a listing of the locations.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            // Datos simulados (puedes cargar desde un archivo JSON o base de datos)
            $locations = [
                [
                    'code' => 1,
                    'name' => 'Sede Central',
                    'image' => 'https://images.unsplash.com/photo-1506702315536-dd8b83e2dcf9',
                    'creationDate' => '2024-01-01',
                ],
                [
                    'code' => 2,
                    'name' => 'Sede Norte',
                    'image' => 'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0',
                    'creationDate' => '2024-01-15',
                ],
                [
                    'code' => 3,
                    'name' => 'Sede Sur',
                    'image' => 'https://images.unsplash.com/photo-1472145246862-b24cf25c9f41',
                    'creationDate' => '2024-02-01',
                ],
                [
                    'code' => 4,
                    'name' => 'Sede Este',
                    'image' => 'https://images.unsplash.com/photo-1554995207-c18c203602cb',
                    'creationDate' => '2024-02-15',
                ],
                [
                    'code' => 5,
                    'name' => 'Sede Oeste',
                    'image' => 'https://images.unsplash.com/photo-1583225151954-18efb9a7f3a0',
                    'creationDate' => '2024-03-01',
                ],
                [
                    'code' => 6,
                    'name' => 'Sede Industrial',
                    'image' => 'https://images.unsplash.com/photo-1506807803488-8eafc15316c9',
                    'creationDate' => '2024-03-15',
                ],
                [
                    'code' => 7,
                    'name' => 'Sede Tecnológica',
                    'image' => 'https://images.unsplash.com/photo-1515879218367-8466d910aaa4',
                    'creationDate' => '2024-04-01',
                ],
                [
                    'code' => 8,
                    'name' => 'Sede Educativa',
                    'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0',
                    'creationDate' => '2024-04-15',
                ],
                [
                    'code' => 9,
                    'name' => 'Sede Creativa',
                    'image' => 'https://images.unsplash.com/photo-1564866657314-1957a66c799c',
                    'creationDate' => '2024-05-01',
                ],
                [
                    'code' => 10,
                    'name' => 'Sede Innovadora',
                    'image' => 'https://images.unsplash.com/photo-1519222970733-f546218fa6d4',
                    'creationDate' => '2024-05-15',
                ],
                [
                    'code' => 11,
                    'name' => 'Sede Científica',
                    'image' => 'https://images.unsplash.com/photo-1568836018428-9ab20c7258e8',
                    'creationDate' => '2024-06-01',
                ],
                [
                    'code' => 12,
                    'name' => 'Sede Agropecuaria',
                    'image' => 'https://images.unsplash.com/photo-1554187094-d4d5f8b4e0b5',
                    'creationDate' => '2024-06-15',
                ],
                [
                    'code' => 13,
                    'name' => 'Sede Comercial',
                    'image' => 'https://images.unsplash.com/photo-1504386106331-3e4e71712b38',
                    'creationDate' => '2024-07-01',
                ],
                [
                    'code' => 14,
                    'name' => 'Sede Administrativa',
                    'image' => 'https://images.unsplash.com/photo-1519985176271-adb1088fa94c',
                    'creationDate' => '2024-07-15',
                ],
                [
                    'code' => 15,
                    'name' => 'Sede Turística',
                    'image' => 'https://images.unsplash.com/photo-1568605114967-8130f3a36994',
                    'creationDate' => '2024-08-01',
                ],
                [
                    'code' => 16,
                    'name' => 'Sede Deportiva',
                    'image' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0',
                    'creationDate' => '2024-08-15',
                ],
                [
                    'code' => 17,
                    'name' => 'Sede Artística',
                    'image' => 'https://images.unsplash.com/photo-1541698444083-023c97d3f4b6',
                    'creationDate' => '2024-09-01',
                ],
                [
                    'code' => 18,
                    'name' => 'Sede Financiera',
                    'image' => 'https://images.unsplash.com/photo-1534081333815-ae5019106622',
                    'creationDate' => '2024-09-15',
                ],
                [
                    'code' => 19,
                    'name' => 'Sede Internacional',
                    'image' => 'https://images.unsplash.com/photo-1530281700549-e82e7bf110d6',
                    'creationDate' => '2024-10-01',
                ],
                [
                    'code' => 20,
                    'name' => 'Sede Salud',
                    'image' => 'https://images.unsplash.com/photo-1507537297725-24a1c029d3ca',
                    'creationDate' => '2024-10-15',
                ],
            ];

            // Retornar la respuesta en formato JSON
            return response()->json($locations);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
