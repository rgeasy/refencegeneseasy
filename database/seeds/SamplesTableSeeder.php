<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sample;

class SamplesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$samples=[
			['article' => 1,
			'name' => 'SH_RAIZ',
			'values' => "SH_RAIZ 21,8 19,87 20,5219988406651 18,7666011384015 20,4220069475376 25,7057438591208 23,7016801071864 23,9266651020132 19,930054621392 22,4924408316197 23,6675993895312 18,3760929650458"],
			['article' => 1,
			'values' => "SH_RAIZ 21,78 19,85 20,4160166870278 18,7860182114884 20,4972954524133 25,8076037951619 23,8386274953419 23,7505898886705 19,9481153867942 22,3606859480872 23,5881779150696 18,333693119718",
			'name' => 'SH_RAIZ'],
			['article' => 1,
			'values' => "SH_RAIZ 21,78 20,15 20,4834598757061 18,9316462596394 20,2808410008956 25,890943742832 23,7505898886705 23,7897177138578 19,9752065348976 22,5489072102765 23,6874547581465 18,2997732434558",
			'name' => 'SH_RAIZ'],
			['article' => 1,
			'values' => "SH_RAIZ 23,48 23,76 23,7303676735014 21,679162101423 22,1254093703506 30,5394608239842 26,1960789628746 26,0786954873128 21,2936424092625 24,1581990019949 25,8715453058382 19,520888788895",
			'name' => 'SH_RAIZ'],
			['article' => 1,
			'values' => "SH_RAIZ 23,42 23,94 23,7785413797002 21,6500364917928 22,2195200014452 30,6228007716543 26,1471691813905 26,0786954873128 21,2846120265613 23,9323334873678 25,9509667802997 19,4784889435672",
			'name' => 'SH_RAIZ'],
			['article' => 1,
			'values' => "SH_RAIZ 23,38 23,38 23,9616014632554 21,8150816130307 22,3983302005251 30,7061407193244 26,3428083073269 26,0395676621256 21,1852778168489 24,0829104971192 25,7127023569151 19,6311283867471",
			'name' => 'SH_RAIZ'],
			['article' => 1,
			'values' => "SH_RAIZ 21,67 20,18 20,5701725468638 18,6598072364241 20,0173312338306 27,6688626264599 23,5940785879214 24,1418681405432 19,9571457694954 22,3983302005251 23,6576717052235 18,410012841308",
			'name' => 'SH_RAIZ'],
			['article' => 1,
			'values' => "SH_RAIZ 21,68 20,06 20,6279809943023 18,5918474806203 19,9796869813927 27,3632828183364 23,6625522819992 24,0636124901686 19,9752065348976 22,3889191374156 23,6278886523004 18,4693726247668",
			'name' => 'SH_RAIZ'],
			['article' => 1,
			'values' => "SH_RAIZ 21,77 20,29 20,6279809943023 18,6209730902505 19,9702759182833 27,4281027776353 23,6625522819992 24,1125222716527 19,930054621392 22,3324527587588 23,6477440209158 18,5287324082257",
			'name' => 'SH_RAIZ'],
			['article' => 1,
			'values' => "SH_RAMO 20,38 18,63 18,8262843824693 16,4365523679844 18,2856956216892 25,0390242777603 22,7821762152857 22,3322062256321 18,3045857351887 20,1584971804726 22,7840354861468 18,2743333362592",
			'name' => 'SH_RAMO'],
			['article' => 1,
			'values' => "SH_RAMO 20,2 18,48 18,8070148999898 16,3685926121805 18,059830107062 24,8816043766057 22,6745746960207 22,3811160071162 18,322646500591 20,2055524960199 22,8634569606083 18,3167331815869",
			'name' => 'SH_RAMO'],
			['article' => 1,
			'values' => "SH_RAMO 20,32 18,54 18,9322665361065 16,4365523679844 18,059830107062 25,066804260317 22,8310859967697 22,3419881819289 18,3768287967978 20,186730369801 22,8634569606083 18,2997732434558",
			'name' => 'SH_RAMO'],
			['article' => 1,
			'values' => "SH_RAMO 20,34 18,64 18,8070148999898 16,5530548065052 17,9092530973106 25,0945842428736 22,9875972975188 22,2441686189608 18,4310110930045 20,3278963164429 22,6351202215315 18,4269727794391",
			'name' => 'SH_RAMO'],
			['article' => 1,
			'values' => "SH_RAMO 20,35 18,53 18,7684759350308 16,4365523679844 17,8433756555443 24,9649443242758 22,7821762152857 22,2148227500703 18,3858591794989 20,2620188746767 22,6649032744545 18,4015328722424",
			'name' => 'SH_RAMO'],
			['article' => 1,
			'values' => "SH_RAMO 20,28 18,67 18,7684759350308 16,4365523679844 17,8810199079822 24,9556843300902 22,8995596908475 22,1463490559926 18,3587680313955 20,3184852533335 22,6450479058392 18,4184928103735",
			'name' => 'SH_RAMO'],
			['article' => 1,
			'values' => "SH_RAMO 20,71 19,28 21,1675265037282 17,7374962648006 18,7562487771624 26,6039632951203 23,5060409812501 22,8506499093634 19,0270163512791 20,7984494719161 23,9852852873772 18,3506530578491",
			'name' => 'SH_RAMO'],
			['article' => 1,
			'values' => "SH_RAMO 20,52 19,26 21,1578917624885 17,6209938262798 18,9068257869138 26,4002434230379 23,4669131560628 22,9093416471443 18,9638036723712 20,6855167146026 24,0150683403003 18,2828133053247",
			'name' => 'SH_RAMO'],
			['article' => 1,
			'values' => "SH_RAMO 20,62 19,26 21,0808138325705 17,747204801344 18,8785925975854 26,6595232602337 23,5256048938437 22,8017401278793 19,0360467339802 20,8455047874635 24,0746344461464 18,070814078686",
			'name' => 'SH_RAMO']
		];

		foreach ($samples as $key=>$value)
		{
			Sample::create($value);
		}
	}
}