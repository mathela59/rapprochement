Regles de gestion : Si le patient a payé totalement sa consultation par C.B. => ne pas en tenir compte.

Liste des lignes non payés par le patient :
SELECT c.*  FROM compta c WHERE c.Patient != c.Payeur;

Liste des lignes SECU pour une facture donnée :




SELECT count(c.Numero) as nb_acte, c.DateFacture, c.NumFacture,  c.Patient,
	(SELECT s.num_lot FROM secu s where s.ss_num=c.SsPatient AND c.NumFacture=s.num_facture limit 1) as num_lot_secu,
	(SELECT SUM(s.montant) FROM secu s where s.ss_num=c.SsPatient AND s.date_acte = c.DateFacture) as paiement_secu,
	SUM(c.Encaisse) as sum_encaisse,
	SUM(c.impaye) as sum_impaye,
	SUM(c.MontantPaye) as sum_montantpaye,
	SUM(c.MontantFacture) as sum_montantfacture,
	c.Payeur,
	c.Mode,
	c.DatePaiement,
	c.Praticien,
	c.Etablissement,
	GROUP_CONCAT(c.Cotations SEPARATOR ',') as ListeCotations,
	c.LibelleActe,
	c.SsPatient,
	c.TypePrestation,
	SUM(c.MontantRecette) as sum_montantrecette,
	SUM(c.MontantReglement) as montantreglement,
	SUM(c.TropPaye) as sum_troppaye,
	c.BanqueCabinet,
	c.BanquePayeur,
	GROUP_CONCAT(c.DetailPrestation SEPARATOR ','),
	GROUP_CONCAT(c.CategorieActe SEPARATOR ','),
	c.NumHospitalisation,
	c.nom_fichier
FROM compta c
WHERE c.DatePaiement BETWEEN '2019-12-01' AND '2019-12-31' GROUP BY c.SsPatient, c.DatePaiement;

SELECT c.*  FROM compta c WHERE c.Patient != c.Payeur;

SELECT c.* FROM compta c HAVING SUM(MontantPaye)!=MontantRecette GROUP BY NumFacture;

