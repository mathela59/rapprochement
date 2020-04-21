create table if not exists compta
(
    numero             int          not null,
    val                int          null,
    DateFacture        date         not null,
    NumFacture         int          not null,
    LibelleFacture     varchar(255) not null,
    Patient            varchar(255) not null,
    Payeur             varchar(255) not null,
    Mode               varchar(255) null,
    DatePaiement       date         null,
    Encaisse           float        null,
    impaye             float        null,
    MontantPaye        float        null,
    MontantFacture     float        null,
    Praticien          varchar(255) not null,
    Etablissement      varchar(255) null,
    Cotations          varchar(255) null,
    LibelleActe        varchar(255) null,
    SsPatient          varchar(25)  null,
    TypePrestation     varchar(255) null,
    MontantRecette     float        null,
    MontantReglement   float        null,
    TropPaye           float        null,
    BanqueCabinet      varchar(255) null,
    BanquePayeur       varchar(255) null,
    DetailPrestation   varchar(255) null,
    CategorieActe      varchar(255) null,
    NumHospitalisation varchar(255) null,
    nom_fichier        varchar(255) not null
);

create table if not exists secu
(
    date_paiement date         not null,
    num_lot       varchar(255) not null,
    num_facture   varchar(255) not null,
    Organisme     varchar(255) not null,
    Patient       varchar(255) not null,
    ss_num        varchar(255) null,
    nature_acte   varchar(255) null,
    date_acte     date         null,
    montant       float        not null,
    nom_fichier   varchar(255) not null
);

